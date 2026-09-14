<?php

namespace Tests\Feature;

use App\Models\ContactInquiry;
use App\Models\DmcRegistration;
use App\Models\FlightInquiry;
use App\Models\Package;
use Database\Seeders\AirportSeeder;
use Database\Seeders\PackageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MvcRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AirportSeeder::class);
        $this->seed(PackageSeeder::class);
    }

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
     * Test dynamic package show by slug route returns HTTP 200.
     */
    public function test_package_show_by_slug(): void
    {
        $package = Package::first();
        $this->assertNotNull($package);

        $response = $this->get("/package/{$package->slug}");
        $response->assertStatus(200);
    }

    /**
     * Test airport search endpoint returns valid JSON array.
     */
    public function test_airport_search_api_returns_json(): void
    {
        $response = $this->getJson('/api/airports?q=');
        $response->assertStatus(200);
        $response->assertExactJson([]);

        $responseWithQuery = $this->getJson('/api/airports?q=YYZ');
        $responseWithQuery->assertStatus(200);
        $json = $responseWithQuery->json();
        $this->assertIsArray($json);
        $this->assertNotEmpty($json);
        $this->assertEquals('YYZ', $json[0]['iata_code']);
    }

    /**
     * Test airline ticketing inquiry POST endpoint stores in MySQL and returns success JSON.
     */
    public function test_airline_ticketing_inquiry_stores_in_database(): void
    {
        $payload = [
            'full_name' => 'Sophia Montgomery',
            'email' => 'sophia.m@luxuryglobe.ca',
            'phone' => '+1 (416) 555-8932',
            'trip_type' => 'roundtrip',
            'traveller_type' => 'personal',
            'cabin_class' => 'business',
            'preferred_airline' => 'Air Canada',
            'dep_city' => 'Toronto (YYZ)',
            'dest_city' => 'London (LHR)',
            'dep_date' => '2026-10-15',
            'return_date' => '2026-10-25',
            'count_adults' => 2,
            'count_children' => 0,
            'count_infants' => 0,
            'flex_dates' => 1,
            'special_requests' => 'Quiet suite seats near window please.',
        ];

        $response = $this->postJson('/airline-ticketing-inquiry', $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('flight_inquiries', [
            'email' => 'sophia.m@luxuryglobe.ca',
            'full_name' => 'Sophia Montgomery',
            'cabin_class' => 'business',
            'trip_type' => 'roundtrip',
        ]);
    }

    /**
     * Test contact form POST endpoint stores in MySQL and returns success JSON.
     */
    public function test_contact_form_stores_in_database(): void
    {
        $payload = [
            'full_name' => 'James Harrison',
            'email' => 'j.harrison@globalholdings.com',
            'phone' => '+1 (604) 777-1122',
            'subject' => 'Holiday Packages',
            'message' => 'We are seeking bespoke private reservations for the Rocky Mountaineer in September.',
        ];

        $response = $this->postJson('/contact', $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('contact_inquiries', [
            'email' => 'j.harrison@globalholdings.com',
            'full_name' => 'James Harrison',
            'subject' => 'Holiday Packages',
        ]);
    }

    /**
     * Test DMC partner registration POST endpoint stores in MySQL and returns success JSON.
     */
    public function test_dmc_registration_stores_in_database(): void
    {
        $payload = [
            'companyName' => 'Alps & Lakes Swiss DMC',
            'contactPerson' => 'Marc Fontana',
            'email' => 'marc@swissdmc-expeditions.ch',
            'phone' => '+41 22 555 3344',
            'country' => 'Switzerland',
            'yearsInOperation' => 12,
            'website' => 'https://www.swissdmc-expeditions.ch',
            'services' => [
                'Accommodation Booking',
                'Ground Transportation',
                'Guided Tours & Sightseeing',
                'Bespoke / Luxury Itineraries',
            ],
            'details' => 'Swiss Luxury DMC operating private helicopter tours and chalet accommodations.',
        ];

        $response = $this->postJson('/register-dmc', $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('dmc_registrations', [
            'email' => 'marc@swissdmc-expeditions.ch',
            'company_name' => 'Alps & Lakes Swiss DMC',
            'country' => 'Switzerland',
        ]);
    }

    /**
     * Test admin dashboard and management sections require authentication and return HTTP 200 when logged in.
     */
    public function test_admin_dashboard_routes_return_ok(): void
    {
        $adminRoutes = [
            '/admin',
            '/admin/inquiries',
            '/admin/contacts',
            '/admin/dmc-registrations',
            '/admin/packages',
        ];

        // Unauthenticated users are redirected to login
        foreach ($adminRoutes as $route) {
            $response = $this->get($route);
            $response->assertRedirect('/login');
        }

        // Authenticated admin can view all sections
        $admin = \App\Models\User::factory()->create();
        $this->actingAs($admin);

        foreach ($adminRoutes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test admin status updates for inquiries, contacts, and DMC applications.
     */
    public function test_admin_status_updates_in_database(): void
    {
        $admin = \App\Models\User::factory()->create();
        $this->actingAs($admin);

        $flight = FlightInquiry::create([
            'full_name' => 'Test User',
            'email' => 'test@user.com',
            'status' => 'pending',
        ]);

        $patchFlight = $this->patch("/admin/inquiries/{$flight->id}", ['status' => 'contacted']);
        $patchFlight->assertStatus(302);
        $this->assertDatabaseHas('flight_inquiries', [
            'id' => $flight->id,
            'status' => 'contacted',
        ]);

        $contact = ContactInquiry::create([
            'full_name' => 'Contact User',
            'email' => 'contact@user.com',
            'phone' => '+123456789',
            'subject' => 'General Inquiry',
            'message' => 'Testing message body.',
            'status' => 'unread',
        ]);

        $patchContact = $this->patch("/admin/contacts/{$contact->id}", ['status' => 'replied']);
        $patchContact->assertStatus(302);
        $this->assertDatabaseHas('contact_inquiries', [
            'id' => $contact->id,
            'status' => 'replied',
        ]);

        $dmc = DmcRegistration::create([
            'company_name' => 'Test DMC',
            'contact_person' => 'DMC Person',
            'email' => 'dmc@test.com',
            'phone' => '+123456789',
            'country' => 'Canada',
            'years_in_operation' => 5,
            'services' => ['Ground Transportation'],
            'status' => 'pending_review',
        ]);

        $patchDmc = $this->patch("/admin/dmc-registrations/{$dmc->id}", ['status' => 'approved']);
        $patchDmc->assertStatus(302);
        $this->assertDatabaseHas('dmc_registrations', [
            'id' => $dmc->id,
            'status' => 'approved',
        ]);
    }

    /**
     * Test sitemap.xml returns 200 with valid XML content.
     */
    public function test_sitemap_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');

        $content = $response->getContent();
        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $content);
        $this->assertStringContainsString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', $content);
        $this->assertStringContainsString('/packages', $content);
        $this->assertStringContainsString('/about', $content);
        $this->assertStringContainsString('/contact', $content);
        $this->assertStringContainsString('/register-dmc', $content);
    }

    /**
     * Test robots.txt contains required allow/disallow directives.
     */
    public function test_robots_txt_contains_directives(): void
    {
        $robotsPath = public_path('robots.txt');
        $this->assertFileExists($robotsPath);

        $content = file_get_contents($robotsPath);
        $this->assertStringContainsString('User-agent: *', $content);
        $this->assertStringContainsString('Disallow: /admin/', $content);
        $this->assertStringContainsString('Disallow: /login', $content);
        $this->assertStringContainsString('Disallow: /api/', $content);
        $this->assertStringNotContainsString('Sitemap:', $content);

        // Test HTTP endpoint
        $response = $this->get('/robots.txt');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/plain; charset=utf-8');
        $response->assertSee('Disallow: /admin/', false);
        $response->assertSee('Disallow: /login', false);
        $response->assertDontSee('Sitemap:', false);
    }

    /**
     * Test SEO Schema.org JSON-LD structured data renders and is valid JSON on all public pages.
     */
    public function test_seo_schemas_render_on_public_pages(): void
    {
        $pages = [
            '/' => ['TravelAgency', 'WebSite', 'ItemList', 'FAQPage'],
            '/about' => ['AboutPage', 'BreadcrumbList'],
            '/contact' => ['ContactPage', 'BreadcrumbList'],
            '/register-dmc' => ['WebPage', 'BreadcrumbList'],
            '/packages' => ['CollectionPage', 'ItemList', 'BreadcrumbList'],
            '/explore-packages' => ['TouristTrip', 'BreadcrumbList'],
            '/stay-detail' => ['Hotel', 'BreadcrumbList'],
            '/voyage-detail' => ['TouristTrip', 'BreadcrumbList'],
        ];

        foreach ($pages as $uri => $expectedTypes) {
            $response = $this->get($uri);
            $response->assertStatus(200);

            $html = $response->getContent();
            $this->assertStringContainsString('application/ld+json', $html, "Page {$uri} must contain application/ld+json");

            preg_match_all('#<script type="application/ld\+json">(.*?)</script>#is', $html, $matches);
            $this->assertNotEmpty($matches[1], "Page {$uri} must contain valid ld+json script blocks");

            $foundTypes = [];
            foreach ($matches[1] as $jsonText) {
                $decoded = json_decode(trim($jsonText), true);
                $this->assertNotNull($decoded, "JSON-LD on {$uri} must be valid JSON: " . json_last_error_msg());
                $this->assertEquals('https://schema.org', $decoded['@context'] ?? '');

                $type = $decoded['@type'] ?? '';
                if (is_array($type)) {
                    foreach ($type as $t) {
                        $foundTypes[] = $t;
                    }
                } else {
                    $foundTypes[] = $type;
                }
            }

            foreach ($expectedTypes as $expectedType) {
                $this->assertContains($expectedType, $foundTypes, "Page {$uri} must declare schema @type {$expectedType}");
            }
        }
    }
}

