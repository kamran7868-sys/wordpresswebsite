<?php

namespace Database\Seeders;

use App\Models\ContactInquiry;
use App\Models\DmcRegistration;
use App\Models\FlightInquiry;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create or update admin user
        User::updateOrCreate(
            ['email' => 'admin@pge.com'],
            [
                'name' => 'PGE Global Concierge Admin',
                'password' => Hash::make('Secret123!'),
            ]
        );

        // 2. Seed initial sample flight inquiries
        if (FlightInquiry::count() === 0) {
            FlightInquiry::create([
                'full_name' => 'Alexander Wright',
                'email' => 'a.wright@vancouver-tech.ca',
                'phone' => '+1 (604) 555-0198',
                'trip_type' => 'roundtrip',
                'traveller_type' => 'personal',
                'cabin_class' => 'business',
                'preferred_airline' => 'Air Canada',
                'dep_city' => 'YVR - Vancouver International',
                'dest_city' => 'LHR - London Heathrow',
                'dep_date' => now()->addDays(20)->toDateString(),
                'return_date' => now()->addDays(32)->toDateString(),
                'count_adults' => 2,
                'count_children' => 0,
                'count_infants' => 0,
                'flex_dates' => true,
                'special_requests' => 'Requires lie-flat business class seats and priority lounge access at YVR and LHR.',
                'status' => 'pending',
                'ip_address' => '127.0.0.1',
            ]);

            FlightInquiry::create([
                'full_name' => 'Elena Rostova',
                'email' => 'elena.r@luxurytravels.com',
                'phone' => '+1 (416) 777-4421',
                'trip_type' => 'multicity',
                'traveller_type' => 'corporate',
                'cabin_class' => 'first',
                'preferred_airline' => 'Emirates',
                'count_adults' => 1,
                'multicity_legs' => [
                    ['dep' => 'YYZ', 'dest' => 'DXB', 'date' => now()->addDays(15)->toDateString()],
                    ['dep' => 'DXB', 'dest' => 'IST', 'date' => now()->addDays(22)->toDateString()],
                    ['dep' => 'IST', 'dest' => 'YYZ', 'date' => now()->addDays(30)->toDateString()],
                ],
                'special_requests' => 'VIP airport private terminal transfer in Dubai and Istanbul.',
                'status' => 'contacted',
                'ip_address' => '127.0.0.1',
            ]);
        }

        // 3. Seed initial sample contact inquiries
        if (ContactInquiry::count() === 0) {
            ContactInquiry::create([
                'full_name' => 'David Sterling',
                'email' => 'dsterling@calgaryenergy.ca',
                'phone' => '+1 (403) 555-8832',
                'subject' => 'Holiday Packages',
                'message' => 'We are interested in booking the 8-day Rocky Mountaineer Luxury Express for an anniversary group of 6 adults in July.',
                'status' => 'unread',
                'ip_address' => '127.0.0.1',
            ]);

            ContactInquiry::create([
                'full_name' => 'Claire Dupont',
                'email' => 'cdupont@montrealart.org',
                'phone' => '+1 (514) 555-3219',
                'subject' => 'Cruises',
                'message' => 'Please provide cabin availability and pricing for the Inside Passage Glacier Voyage departing Vancouver.',
                'status' => 'in_progress',
                'ip_address' => '127.0.0.1',
            ]);
        }

        // 4. Seed initial sample DMC registrations
        if (DmcRegistration::count() === 0) {
            DmcRegistration::create([
                'company_name' => 'Serendipity Ceylon Expeditions Ltd',
                'contact_person' => 'Rohan Wickramasinghe',
                'email' => 'partners@serendipityceylon.com',
                'phone' => '+94 11 234 5678',
                'country' => 'Sri Lanka',
                'years_in_operation' => 14,
                'website' => 'https://www.serendipityceylon.com',
                'services' => [
                    'Accommodation Booking',
                    'Ground Transportation',
                    'Guided Tours & Sightseeing',
                    'Bespoke / Luxury Itineraries'
                ],
                'details' => 'Premier inbound luxury tour operator licensed with Sri Lanka Tourism Development Authority (SLTDA). Fleet of 25 Mercedes-Benz vehicles and exclusive tea bungalow allotments.',
                'status' => 'approved',
                'ip_address' => '127.0.0.1',
            ]);

            DmcRegistration::create([
                'company_name' => 'Anatolia Bosphorus Destination Management',
                'contact_person' => 'Aylin Demir',
                'email' => 'operations@anatoliadmcturkey.com',
                'phone' => '+90 212 555 1234',
                'country' => 'Turkey',
                'years_in_operation' => 9,
                'website' => 'https://www.anatoliadmcturkey.com',
                'services' => [
                    'Accommodation Booking',
                    'Ground Transportation',
                    'Guided Tours & Sightseeing',
                    'MICE & Corporate Travel',
                    'Bespoke / Luxury Itineraries'
                ],
                'details' => 'TURSAB Group A licensed agency specializing in VIP Bosphorus yacht charters, Cappadocia balloon expeditions, and Aegean coastal journeys.',
                'status' => 'pending_review',
                'ip_address' => '127.0.0.1',
            ]);
        }
    }
}
