<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InquiryController extends Controller
{
    /**
     * Handle incoming airline ticketing inquiries.
     */
    public function airlineTicketing(Request $request): JsonResponse
    {
        Log::info('Airline Ticketing Inquiry Submitted:', $request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you! Your airline ticketing inquiry has been submitted successfully. Our Canadian flight concierges will contact you shortly.',
        ]);
    }
}
