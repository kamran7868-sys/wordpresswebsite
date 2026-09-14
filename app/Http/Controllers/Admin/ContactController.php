<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

    /**
     * Send official reply to client, record admin response, and mark inquiry as replied.
     */
    public function reply(Request $request, ContactInquiry $contact): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string|min:5',
        ]);

        // 1. Update contact record with admin reply and set status to replied
        $contact->update([
            'admin_reply' => $validated['reply_message'],
            'replied_at' => now(),
            'status' => 'replied',
        ]);

        // 2. Dispatch email to customer (with fallback error logging and timeout safeguard)
        $emailDispatched = false;
        try {
            $prevTimeout = ini_get('default_socket_timeout');
            ini_set('default_socket_timeout', '5');
            Mail::raw($validated['reply_message'], function ($mail) use ($contact, $validated) {
                $mail->to($contact->email, $contact->full_name)
                     ->subject($validated['reply_subject']);
            });
            ini_set('default_socket_timeout', $prevTimeout);
            $emailDispatched = true;
        } catch (\Throwable $e) {
            Log::warning("Contact reply email to {$contact->email} was recorded but email delivery failed: " . $e->getMessage());
        }

        $mailerDriver = config('mail.default', 'log');
        if ($emailDispatched && $mailerDriver !== 'log') {
            $successMsg = "Official reply successfully recorded and sent to {$contact->full_name} ({$contact->email}). Inquiry status updated to Replied.";
        } else {
            $successMsg = "Official reply successfully recorded and status updated to Replied.";
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => $successMsg,
                'contact_status' => 'replied',
                'admin_reply' => $validated['reply_message'],
                'replied_at' => now()->format('F d, Y \a\t h:i A'),
                'email_dispatched' => $emailDispatched,
            ]);
        }

        return back()->with('success', $successMsg);
    }
}
