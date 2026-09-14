<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlightInquiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Display a listing of flight inquiries.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $query = FlightInquiry::latest();

        if ($status && in_array($status, ['pending', 'contacted', 'quoted', 'booked', 'archived'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('dep_city', 'like', "%{$search}%")
                  ->orWhere('dest_city', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => FlightInquiry::count(),
            'pending' => FlightInquiry::where('status', 'pending')->count(),
            'contacted' => FlightInquiry::where('status', 'contacted')->count(),
            'quoted' => FlightInquiry::where('status', 'quoted')->count(),
            'booked' => FlightInquiry::where('status', 'booked')->count(),
            'archived' => FlightInquiry::where('status', 'archived')->count(),
        ];

        return view('admin.inquiries.index', compact('inquiries', 'status', 'search', 'counts'));
    }

    /**
     * Display full inquiry detail.
     */
    public function show(FlightInquiry $inquiry): View
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    /**
     * Update inquiry status via AJAX or redirect.
     */
    public function update(Request $request, FlightInquiry $inquiry): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,contacted,quoted,booked,archived',
        ]);

        $inquiry->update(['status' => $validated['status']]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'inquiry_id' => $inquiry->id,
                'inquiry_status' => $inquiry->status,
                'message' => "Flight inquiry status updated to " . ucfirst($inquiry->status) . ".",
            ]);
        }

        return back()->with('success', "Flight inquiry status updated to " . ucfirst($inquiry->status) . ".");
    }

    /**
     * Send official reply / quote to client, record admin response, and mark flight inquiry as contacted/quoted.
     */
    public function reply(Request $request, FlightInquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string|min:5',
            'target_status' => 'nullable|string|in:contacted,quoted,booked',
        ]);

        $newStatus = $validated['target_status'] ?? ($inquiry->status === 'pending' ? 'contacted' : $inquiry->status);

        // 1. Update inquiry record with admin reply and timestamp
        $inquiry->update([
            'admin_reply' => $validated['reply_message'],
            'replied_at' => now(),
            'status' => $newStatus,
        ]);

        // 2. Dispatch email to customer (with fallback error logging)
        try {
            Mail::raw($validated['reply_message'], function ($mail) use ($inquiry, $validated) {
                $mail->to($inquiry->email, $inquiry->full_name)
                     ->subject($validated['reply_subject']);
            });
        } catch (\Throwable $e) {
            Log::warning("Flight inquiry reply email to {$inquiry->email} was recorded but email delivery failed: " . $e->getMessage());
        }

        return back()->with('success', "Official reply successfully sent to {$inquiry->full_name} ({$inquiry->email}) and recorded. Status updated to " . ucfirst($newStatus) . ".");
    }
}

