<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MvcRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test all general page routes respond with HTTP 200.
     */
    public function test_page_routes_return_ok(): void
    {
        $routes = [
            '/',
            '/about',
            '/contact',
            '/register-dmc',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test all package routes respond with HTTP 200.
     */
    public function test_package_routes_return_ok(): void
    {
        $routes = [
            '/packages',
            '/explore-packages',
            '/stay-detail',
            '/voyage-detail',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test airport search endpoint returns valid JSON array.
     */
    public function test_airport_search_api_returns_json(): void
    {
        $response = $this->getJson('/api/airports?q=');
        $response->assertStatus(200);
        $response->assertExactJson([]);

        $responseWithQuery = $this->getJson('/api/airports?q=NYC');
        $responseWithQuery->assertStatus(200);
        $this->assertIsArray($responseWithQuery->json());
    }

    /**
     * Test airline ticketing inquiry POST endpoint returns success.
     */
    public function test_airline_ticketing_inquiry_returns_success(): void
    {
        $response = $this->postJson('/airline-ticketing-inquiry', [
            'origin' => 'YYZ',
            'destination' => 'LHR',
            'passengers' => 2,
            'cabin' => 'business',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);
    }
}
