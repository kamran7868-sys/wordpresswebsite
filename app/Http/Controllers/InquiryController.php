<?php

namespace App\Http\Controllers;

use App\Models\FlightInquiry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Handle incoming airline ticketing inquiries.
     */
    public function airlineTicketing(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:50',
            'trip_type' => 'nullable|string|in:roundtrip,oneway,multicity',
            'traveller_type' => 'nullable|string|max:50',
            'cabin_class' => 'nullable|string|max:50',
            'preferred_airline' => 'nullable|string|max:100',
            'dep_city' => 'nullable|string|max:150',
            'dest_city' => 'nullable|string|max:150',
            'dep_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'count_adults' => 'nullable|integer|min:1|max:9',
            'count_children' => 'nullable|integer|min:0|max:9',
            'count_infants' => 'nullable|integer|min:0|max:9',
            'flex_dates' => 'nullable',
            'special_requests' => 'nullable|string|max:1000',
            'leg_dep' => 'nullable|array',
            'leg_dest' => 'nullable|array',
            'leg_date' => 'nullable|array',
        ]);

        // Process multicity legs if provided
        $multicityLegs = [];
        if (!empty($validated['leg_dep']) && is_array($validated['leg_dep'])) {
            foreach ($validated['leg_dep'] as $idx => $origin) {
                if (!empty($origin)) {
                    $multicityLegs[] = [
                        'dep' => $origin,
                        'dest' => $validated['leg_dest'][$idx] ?? null,
                        'date' => $validated['leg_date'][$idx] ?? null,
                    ];
                }
            }
        }

        $inquiry = FlightInquiry::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'trip_type' => $validated['trip_type'] ?? 'roundtrip',
            'traveller_type' => $validated['traveller_type'] ?? 'personal',
            'cabin_class' => $validated['cabin_class'] ?? 'economy',
            'preferred_airline' => $validated['preferred_airline'] ?? null,
            'dep_city' => $validated['dep_city'] ?? null,
            'dest_city' => $validated['dest_city'] ?? null,
            'dep_date' => $validated['dep_date'] ?? null,
            'return_date' => $validated['return_date'] ?? null,
            'count_adults' => $validated['count_adults'] ?? 1,
            'count_children' => $validated['count_children'] ?? 0,
            'count_infants' => $validated['count_infants'] ?? 0,
            'flex_dates' => !empty($validated['flex_dates']),
            'multicity_legs' => !empty($multicityLegs) ? $multicityLegs : null,
            'special_requests' => $validated['special_requests'] ?? null,
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        Log::info('Flight Inquiry Saved to MySQL:', ['id' => $inquiry->id, 'email' => $inquiry->email]);

        // Dispatch admin alert notification email
        try {
            $adminEmail = config('mail.from.address', 'admin@premiumglobalexp.com');
            $alertSubject = "✈ New Flight Inquiry #{$inquiry->id}: {$inquiry->full_name} (" . ($inquiry->dep_city ?: 'Any') . " → " . ($inquiry->dest_city ?: 'Any') . ")";
            $alertBody = "A new airline ticketing inquiry has been received on the website:\n\n"
                       . "Client: {$inquiry->full_name}\n"
                       . "Email: {$inquiry->email}\n"
                       . "Phone: " . ($inquiry->phone ?: 'Not provided') . "\n"
                       . "Trip Type: " . ucfirst($inquiry->trip_type) . "\n"
                       . "Route: " . ($inquiry->dep_city ?: 'N/A') . " → " . ($inquiry->dest_city ?: 'N/A') . "\n"
                       . "Depart Date: " . ($inquiry->dep_date ? $inquiry->dep_date->format('M d, Y') : 'Flexible') . "\n"
                       . "Return Date: " . ($inquiry->return_date ? $inquiry->return_date->format('M d, Y') : 'N/A') . "\n"
                       . "Class: " . ucfirst($inquiry->cabin_class) . "\n"
                       . "Passengers: {$inquiry->count_adults} Adult(s), {$inquiry->count_children} Child(ren), {$inquiry->count_infants} Infant(s)\n"
                       . "Special Requests: " . ($inquiry->special_requests ?: 'None') . "\n\n"
                       . "View & Reply in Admin Panel: " . route('admin.inquiries.show', $inquiry->id);

            Mail::raw($alertBody, function ($mail) use ($adminEmail, $alertSubject) {
                $mail->to($adminEmail)->subject($alertSubject);
            });
        } catch (\Throwable $e) {
            Log::warning("Could not send admin flight inquiry notification email: " . $e->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'inquiry_id' => $inquiry->id,
            'message' => 'Thank you! Your airline ticketing inquiry has been submitted successfully. Our Canadian flight concierges will contact you shortly.',
        ]);
    }
}
