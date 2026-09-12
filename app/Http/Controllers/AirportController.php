<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Search airports by IATA code, city, name, or country for autocomplete.
     */
    public function search(Request $request): JsonResponse
    {
        $q = trim((string) $request->input('q', ''));
        if (strlen($q) < 1) {
            return response()->json([]);
        }

        $airports = Airport::search($q)
            ->select('iata_code', 'name', 'city', 'country')
            ->limit(25)
            ->get();

        return response()->json($airports);
    }
}
