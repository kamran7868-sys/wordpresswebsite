<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\DmcRegistration;
use App\Models\FlightInquiry;
use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Overview Dashboard.
     */
    public function dashboard(): View
    {
        $stats = [
            'total_flights' => FlightInquiry::count(),
            'pending_flights' => FlightInquiry::where('status', 'pending')->count(),
            'total_contacts' => ContactInquiry::count(),
            'unread_contacts' => ContactInquiry::where('status', 'unread')->count(),
            'total_dmc' => DmcRegistration::count(),
            'pending_dmc' => DmcRegistration::where('status', 'pending_review')->count(),
            'total_packages' => Package::count(),
        ];

        $recentFlights = FlightInquiry::latest()->take(5)->get();
        $recentContacts = ContactInquiry::latest()->take(5)->get();
        $recentDmcs = DmcRegistration::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentFlights', 'recentContacts', 'recentDmcs'));
    }

    /**
     * View all airline ticketing inquiries.
     */
    public function flightInquiries(Request $request): View
    {
        $status = $request->query('status');
        $query = FlightInquiry::latest();
        if ($status) {
            $query->where('status', $status);
        }
        $inquiries = $query->paginate(15);

        return view('admin.inquiries', compact('inquiries', 'status'));
    }

    /**
     * Update flight inquiry status.
     */
    public function updateFlightStatus(Request $request, FlightInquiry $inquiry): RedirectResponse
    {
        $request->validate(['status' => 'required|string|in:pending,contacted,quoted,booked,archived']);
        $inquiry->update(['status' => $request->status]);

        return back()->with('success', 'Flight inquiry status updated successfully.');
    }

    /**
     * View all contact messages.
     */
    public function contactInquiries(Request $request): View
    {
        $status = $request->query('status');
        $query = ContactInquiry::latest();
        if ($status) {
            $query->where('status', $status);
        }
        $messages = $query->paginate(15);

        return view('admin.contacts', compact('messages', 'status'));
    }

    /**
     * Update contact message status.
     */
    public function updateContactStatus(Request $request, ContactInquiry $contact): RedirectResponse
    {
        $request->validate(['status' => 'required|string|in:unread,in_progress,replied,archived']);
        $contact->update(['status' => $request->status]);

        return back()->with('success', 'Contact message status updated successfully.');
    }

    /**
     * View all DMC registrations.
     */
    public function dmcRegistrations(Request $request): View
    {
        $status = $request->query('status');
        $query = DmcRegistration::latest();
        if ($status) {
            $query->where('status', $status);
        }
        $registrations = $query->paginate(15);

        return view('admin.dmc-registrations', compact('registrations', 'status'));
    }

    /**
     * Update DMC registration status.
     */
    public function updateDmcStatus(Request $request, DmcRegistration $dmc): RedirectResponse
    {
        $request->validate(['status' => 'required|string|in:pending_review,approved,rejected,active']);
        $dmc->update(['status' => $request->status]);

        return back()->with('success', 'DMC partner application status updated successfully.');
    }

    /**
     * View all packages in database.
     */
    public function packages(Request $request): View
    {
        $category = $request->query('category');
        $query = Package::latest();
        if ($category) {
            $query->where('category', $category);
        }
        $packages = $query->paginate(15);

        return view('admin.packages', compact('packages', 'category'));
    }
}
