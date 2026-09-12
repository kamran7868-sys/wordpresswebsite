<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DmcRegistration;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DmcController extends Controller
{
    /**
     * Display a listing of DMC partner applications.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $query = DmcRegistration::latest();

        if ($status && in_array($status, ['pending_review', 'approved', 'rejected', 'active'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('contact_person', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $registrations = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => DmcRegistration::count(),
            'pending_review' => DmcRegistration::where('status', 'pending_review')->count(),
            'approved' => DmcRegistration::where('status', 'approved')->count(),
            'rejected' => DmcRegistration::where('status', 'rejected')->count(),
            'active' => DmcRegistration::where('status', 'active')->count(),
        ];

        return view('admin.dmc.index', compact('registrations', 'status', 'search', 'counts'));
    }

    /**
     * Display full application detail.
     */
    public function show(DmcRegistration $dmc): View
    {
        return view('admin.dmc.show', compact('dmc'));
    }

    /**
     * Update DMC application status via AJAX or redirect.
     */
    public function update(Request $request, DmcRegistration $dmc): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending_review,approved,rejected,active',
        ]);

        $dmc->update(['status' => $validated['status']]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'dmc_id' => $dmc->id,
                'dmc_status' => $dmc->status,
                'message' => "DMC application status updated to " . str_replace('_', ' ', $dmc->status) . ".",
            ]);
        }

        return back()->with('success', "DMC partner application status updated to " . str_replace('_', ' ', $dmc->status) . ".");
    }
}
