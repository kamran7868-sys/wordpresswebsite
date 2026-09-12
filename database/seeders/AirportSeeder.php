<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $airports = [
            // Canada
            ['iata_code' => 'YYZ', 'name' => 'Toronto Pearson International Airport', 'city' => 'Toronto', 'country' => 'Canada'],
            ['iata_code' => 'YVR', 'name' => 'Vancouver International Airport', 'city' => 'Vancouver', 'country' => 'Canada'],
            ['iata_code' => 'YUL', 'name' => 'Montréal-Trudeau International Airport', 'city' => 'Montreal', 'country' => 'Canada'],
            ['iata_code' => 'YYC', 'name' => 'Calgary International Airport', 'city' => 'Calgary', 'country' => 'Canada'],
            ['iata_code' => 'YOW', 'name' => 'Ottawa Macdonald-Cartier International Airport', 'city' => 'Ottawa', 'country' => 'Canada'],
            ['iata_code' => 'YEG', 'name' => 'Edmonton International Airport', 'city' => 'Edmonton', 'country' => 'Canada'],
            ['iata_code' => 'YHZ', 'name' => 'Halifax Stanfield International Airport', 'city' => 'Halifax', 'country' => 'Canada'],
            ['iata_code' => 'YWG', 'name' => 'Winnipeg Richardson International Airport', 'city' => 'Winnipeg', 'country' => 'Canada'],
            ['iata_code' => 'YYJ', 'name' => 'Victoria International Airport', 'city' => 'Victoria', 'country' => 'Canada'],

            // United States
            ['iata_code' => 'JFK', 'name' => 'John F. Kennedy International Airport', 'city' => 'New York', 'country' => 'United States'],
            ['iata_code' => 'LAX', 'name' => 'Los Angeles International Airport', 'city' => 'Los Angeles', 'country' => 'United States'],
            ['iata_code' => 'ORD', 'name' => 'O\'Hare International Airport', 'city' => 'Chicago', 'country' => 'United States'],
            ['iata_code' => 'MIA', 'name' => 'Miami International Airport', 'city' => 'Miami', 'country' => 'United States'],
            ['iata_code' => 'SFO', 'name' => 'San Francisco International Airport', 'city' => 'San Francisco', 'country' => 'United States'],

            // Europe
            ['iata_code' => 'LHR', 'name' => 'Heathrow Airport', 'city' => 'London', 'country' => 'United Kingdom'],
            ['iata_code' => 'CDG', 'name' => 'Charles de Gaulle Airport', 'city' => 'Paris', 'country' => 'France'],
            ['iata_code' => 'FRA', 'name' => 'Frankfurt Airport', 'city' => 'Frankfurt', 'country' => 'Germany'],
            ['iata_code' => 'AMS', 'name' => 'Amsterdam Airport Schiphol', 'city' => 'Amsterdam', 'country' => 'Netherlands'],
            ['iata_code' => 'IST', 'name' => 'Istanbul Airport', 'city' => 'Istanbul', 'country' => 'Turkey'],

            // Middle East & Africa
            ['iata_code' => 'DXB', 'name' => 'Dubai International Airport', 'city' => 'Dubai', 'country' => 'United Arab Emirates'],
            ['iata_code' => 'DOH', 'name' => 'Hamad International Airport', 'city' => 'Doha', 'country' => 'Qatar'],
            ['iata_code' => 'CAI', 'name' => 'Cairo International Airport', 'city' => 'Cairo', 'country' => 'Egypt'],

            // Asia & Pacific
            ['iata_code' => 'SIN', 'name' => 'Singapore Changi Airport', 'city' => 'Singapore', 'country' => 'Singapore'],
            ['iata_code' => 'BKK', 'name' => 'Suvarnabhumi Airport', 'city' => 'Bangkok', 'country' => 'Thailand'],
            ['iata_code' => 'HAN', 'name' => 'Noi Bai International Airport', 'city' => 'Hanoi', 'country' => 'Vietnam'],
            ['iata_code' => 'SGN', 'name' => 'Tan Son Nhat International Airport', 'city' => 'Ho Chi Minh City', 'country' => 'Vietnam'],
            ['iata_code' => 'CMB', 'name' => 'Bandaranaike International Airport', 'city' => 'Colombo', 'country' => 'Sri Lanka'],
            ['iata_code' => 'KTM', 'name' => 'Tribhuvan International Airport', 'city' => 'Kathmandu', 'country' => 'Nepal'],
            ['iata_code' => 'NRT', 'name' => 'Narita International Airport', 'city' => 'Tokyo', 'country' => 'Japan'],
            ['iata_code' => 'SYD', 'name' => 'Sydney Kingsford Smith Airport', 'city' => 'Sydney', 'country' => 'Australia'],
        ];

        foreach ($airports as $airport) {
            Airport::updateOrCreate(
                ['iata_code' => $airport['iata_code']],
                $airport
            );
        }
    }
}
