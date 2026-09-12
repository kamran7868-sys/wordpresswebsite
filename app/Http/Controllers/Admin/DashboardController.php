<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\DmcRegistration;
use App\Models\FlightInquiry;
use App\Models\Package;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Admin Overview Dashboard.
     */
    public function index(): View
    {
        $packageStats = [
            'total' => Package::count(),
            'published' => Package::where('status', 'published')->count(),
            'draft' => Package::where('status', 'draft')->count(),
            'archived' => Package::where('status', 'archived')->count(),
        ];

        $pendingFlightsCount = FlightInquiry::where('status', 'pending')->count();
        $unreadContactsCount = ContactInquiry::where('status', 'unread')->count();
        $pendingDmcCount = DmcRegistration::where('status', 'pending_review')->count();

        $recentFlights = FlightInquiry::latest()->take(5)->get();
        $recentContacts = ContactInquiry::latest()->take(5)->get();
        $recentDmcs = DmcRegistration::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'packageStats',
            'pendingFlightsCount',
            'unreadContactsCount',
            'pendingDmcCount',
            'recentFlights',
            'recentContacts',
            'recentDmcs'
        ));
    }
}
