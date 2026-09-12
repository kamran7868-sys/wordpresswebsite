<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\DmcRegistration;
use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Display the Home page with dynamic travel categories from MySQL.
     */
    public function home(): View
    {
        $holidayPackages = Package::published()->category('holiday')->take(6)->get();
        $cruisePackages = Package::published()->category('cruise')->take(4)->get();
        $hotelPackages = Package::published()->category('hotel')->take(6)->get();

        return view('pages.home', compact('holidayPackages', 'cruisePackages', 'hotelPackages'));
    }

    /**
     * Display the About Us page with dynamic stats.
     */
    public function about(): View
    {
        $totalPackages = Package::published()->count();
        $totalDestinations = Package::published()->distinct('country')->count('country');
        $verifiedDmcPartners = DmcRegistration::where('status', 'approved')->count();

        // Ensure minimum presentation numbers for credibility
        $stats = [
            'destinations' => max(40, $totalDestinations + 30),
            'packages' => max(15, $totalPackages),
            'partners' => max(85, $verifiedDmcPartners + 80),
            'satisfaction' => '99.4%',
        ];

        return view('pages.about', compact('stats'));
    }

    /**
     * Display the Contact page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle incoming Contact inquiries and save to MySQL.
     */
    public function submitContact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:50',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|min:10|max:3000',
        ]);

        $inquiry = ContactInquiry::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'unread',
            'ip_address' => $request->ip(),
        ]);

        Log::info('Contact Inquiry Saved to MySQL:', ['id' => $inquiry->id, 'email' => $inquiry->email]);

        return response()->json([
            'status' => 'success',
            'inquiry_id' => $inquiry->id,
            'message' => 'Thank you! Your message has been received by Premium Global Expeditions. Our Canadian travel concierges will respond within 24 hours.',
        ]);
    }

    /**
     * Display the Register as DMC page.
     */
    public function registerDmc(): View
    {
        return view('pages.register-dmc');
    }

    /**
     * Handle incoming Destination Management Company (DMC) partner registrations.
     */
    public function submitRegisterDmc(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'companyName' => 'required|string|max:200',
            'contactPerson' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:100',
            'yearsInOperation' => 'required|integer|min:0|max:150',
            'website' => 'nullable|string|max:255',
            'services' => 'required|array|min:1',
            'services.*' => 'string|max:100',
            'details' => 'nullable|string|max:3000',
        ]);

        $registration = DmcRegistration::create([
            'company_name' => $validated['companyName'],
            'contact_person' => $validated['contactPerson'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'years_in_operation' => $validated['yearsInOperation'],
            'website' => $validated['website'] ?? null,
            'services' => $validated['services'],
            'details' => $validated['details'] ?? null,
            'status' => 'pending_review',
            'ip_address' => $request->ip(),
        ]);

        Log::info('DMC Registration Saved to MySQL:', ['id' => $registration->id, 'company' => $registration->company_name]);

        return response()->json([
            'status' => 'success',
            'registration_id' => $registration->id,
            'message' => 'Thank you! Your DMC partnership application has been received by Premium Global Expeditions. Our global partnerships division will review your credentials and contact you within 2 business days.',
        ]);
    }
}
