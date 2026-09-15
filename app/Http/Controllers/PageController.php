<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\DmcRegistration;
use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    /**
     * Display the Home page with dynamic travel categories from MySQL.
     */
    public function home(): View
    {
        $holidayPackages = Package::published()->category('holiday')->latest()->get();
        $cruisePackages = Package::published()->category('cruise')->latest()->get();
        $hotelPackages = Package::published()->category('hotel')->latest()->get();

        return view('pages.home', compact('holidayPackages', 'cruisePackages', 'hotelPackages'));
    }

    /**
     * Display the About Us page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Display the Contact Us page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle incoming Contact Us form submissions.
     */
    public function submitContact(Request $request): mixed
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

        // Dispatch admin alert notification email
        try {
            $adminEmail = config('mail.from.address', 'admin@premiumglobalexp.com');
            $alertSubject = "✉ New Contact Message #{$inquiry->id}: {$inquiry->subject} from {$inquiry->full_name}";
            $alertBody = "A new contact message has been received on the website:\n\n"
                       . "Sender: {$inquiry->full_name}\n"
                       . "Email: {$inquiry->email}\n"
                       . "Phone: {$inquiry->phone}\n"
                       . "Subject: {$inquiry->subject}\n\n"
                       . "Message:\n{$inquiry->message}\n\n"
                       . "View & Reply in Admin Panel: " . route('admin.contacts.show', $inquiry->id);

            Mail::raw($alertBody, function ($mail) use ($adminEmail, $alertSubject) {
                $mail->to($adminEmail)->subject($alertSubject);
            });
        } catch (\Throwable $e) {
            Log::warning("Could not send admin contact notification email: " . $e->getMessage());
        }

        // Return JSON response for AJAX (triggers popup modal in browser)
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'inquiry_id' => $inquiry->id,
                'message' => 'Thank you! Your message has been received by Premium Global Expeditions. Our Canadian travel concierges will respond within 24 hours.',
            ]);
        }

        // Standard browser POST fallback: redirects back to contact page and displays popup modal
        return redirect()->route('contact')->with([
            'contact_success' => true,
            'inquiry_id' => $inquiry->id,
            'full_name' => $inquiry->full_name,
            'subject' => $inquiry->subject,
        ]);
    }

    /**
     * Display the Contact Form submission confirmation / Thank You page.
     */
    public function contactSuccess(): View
    {
        return view('pages.contact-success');
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
