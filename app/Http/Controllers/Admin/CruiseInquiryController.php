<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CruiseInquiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CruiseInquiryController extends Controller
{
    /**
     * Display a listing of cruise inquiries.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $region = $request->query('region');
        $search = $request->query('search');

        $query = CruiseInquiry::latest();

        if ($status && in_array($status, ['unread', 'in_progress', 'replied', 'archived'])) {
            $query->where('status', $status);
        }

        if ($region) {
            $query->where('cruise_region', $region);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('voyage_name', 'like', "%{$search}%")
                  ->orWhere('cruise_region', 'like', "%{$search}%")
                  ->orWhere('cruise_line', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->paginate(15)->withQueryString();

        $regions = CruiseInquiry::select('cruise_region')->distinct()->pluck('cruise_region');

        $counts = [
            'all' => CruiseInquiry::count(),
            'unread' => CruiseInquiry::where('status', 'unread')->count(),
            'in_progress' => CruiseInquiry::where('status', 'in_progress')->count(),
            'replied' => CruiseInquiry::where('status', 'replied')->count(),
            'archived' => CruiseInquiry::where('status', 'archived')->count(),
        ];

        return view('admin.cruise-inquiries.index', compact('inquiries', 'status', 'region', 'search', 'regions', 'counts'));
    }

    /**
     * Display full inquiry detail.
     */
    public function show(CruiseInquiry $cruiseInquiry): View
    {
        // Auto mark as in_progress if currently unread
        if ($cruiseInquiry->status === 'unread') {
            $cruiseInquiry->update(['status' => 'in_progress']);
        }

        return view('admin.cruise-inquiries.show', compact('cruiseInquiry'));
    }

    /**
     * Update inquiry status via AJAX or redirect.
     */
    public function update(Request $request, CruiseInquiry $cruiseInquiry): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:unread,in_progress,replied,archived',
        ]);

        $cruiseInquiry->update(['status' => $validated['status']]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'inquiry_id' => $cruiseInquiry->id,
                'inquiry_status' => $cruiseInquiry->status,
                'message' => "Cruise inquiry status updated to " . str_replace('_', ' ', $cruiseInquiry->status) . ".",
            ]);
        }

        return back()->with('success', "Cruise inquiry status updated to " . str_replace('_', ' ', $cruiseInquiry->status) . ".");
    }

    /**
     * Send official reply / quote to client, record admin response, and mark inquiry as replied.
     */
    public function reply(Request $request, CruiseInquiry $cruiseInquiry): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string|min:5',
        ]);

        // 1. Update record with admin reply and mark status as replied
        $cruiseInquiry->update([
            'admin_reply' => $validated['reply_message'],
            'replied_at' => now(),
            'status' => 'replied',
        ]);

        // 2. Dispatch email to customer (with error logging & socket timeout safeguard)
        $emailDispatched = false;
        try {
            $prevTimeout = ini_get('default_socket_timeout');
            ini_set('default_socket_timeout', '5');
            Mail::raw($validated['reply_message'], function ($mail) use ($cruiseInquiry, $validated) {
                $mail->to($cruiseInquiry->email, $cruiseInquiry->full_name)
                     ->subject($validated['reply_subject']);
            });
            ini_set('default_socket_timeout', $prevTimeout);
            $emailDispatched = true;
        } catch (\Throwable $e) {
            Log::warning("Cruise inquiry reply email to {$cruiseInquiry->email} was recorded but email delivery failed: " . $e->getMessage());
        }

        $mailerDriver = config('mail.default', 'log');
        if ($emailDispatched && $mailerDriver !== 'log') {
            $successMsg = "Official reply successfully recorded and sent to {$cruiseInquiry->full_name} ({$cruiseInquiry->email}). Inquiry status updated to Replied.";
        } else {
            $successMsg = "Official reply successfully recorded and status updated to Replied.";
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => $successMsg,
                'inquiry_status' => 'replied',
                'admin_reply' => $validated['reply_message'],
                'replied_at' => now()->format('F d, Y \a\t h:i A'),
                'email_dispatched' => $emailDispatched,
            ]);
        }

        return back()->with('success', $successMsg);
    }
}
