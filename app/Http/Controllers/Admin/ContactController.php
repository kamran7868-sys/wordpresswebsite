<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of contact messages.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $subject = $request->query('subject');
        $search = $request->query('search');

        $query = ContactInquiry::latest();

        if ($status && in_array($status, ['unread', 'in_progress', 'replied', 'archived'])) {
            $query->where('status', $status);
        }

        if ($subject) {
            $query->where('subject', $subject);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $messages = $query->paginate(15)->withQueryString();

        $subjects = ContactInquiry::select('subject')->distinct()->pluck('subject');

        $counts = [
            'all' => ContactInquiry::count(),
            'unread' => ContactInquiry::where('status', 'unread')->count(),
            'in_progress' => ContactInquiry::where('status', 'in_progress')->count(),
            'replied' => ContactInquiry::where('status', 'replied')->count(),
            'archived' => ContactInquiry::where('status', 'archived')->count(),
        ];

        return view('admin.contacts.index', compact('messages', 'status', 'subject', 'search', 'subjects', 'counts'));
    }

    /**
     * Display full message detail.
     */
    public function show(ContactInquiry $contact): View
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Update contact message status via AJAX or redirect.
     */
    public function update(Request $request, ContactInquiry $contact): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:unread,in_progress,replied,archived',
        ]);

        $contact->update(['status' => $validated['status']]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'contact_id' => $contact->id,
                'contact_status' => $contact->status,
                'message' => "Contact message status updated to " . str_replace('_', ' ', $contact->status) . ".",
            ]);
        }

        return back()->with('success', "Contact message status updated to " . str_replace('_', ' ', $contact->status) . ".");
    }
}
