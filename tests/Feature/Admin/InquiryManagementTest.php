<?php

namespace Tests\Feature\Admin;

use App\Models\FlightInquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InquiryManagementTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /**
     * Test unauthenticated users are blocked.
     */
    public function test_unauthenticated_users_are_blocked(): void
    {
        $response = $this->get('/admin/inquiries');
        $response->assertRedirect('/login');

        $inquiry = FlightInquiry::create([
            'full_name' => 'John Doe',
            'email' => 'john@doe.com',
            'status' => 'pending',
        ]);

        $detailResponse = $this->get("/admin/inquiries/{$inquiry->id}");
        $detailResponse->assertRedirect('/login');
    }

    /**
     * Test inquiries list view loads with data, search and status filters.
     */
    public function test_inquiries_list_loads_with_filters_and_search(): void
    {
        FlightInquiry::create([
            'full_name' => 'Julian Vance',
            'email' => 'jvance@vancouvertravel.com',
            'trip_type' => 'roundtrip',
            'dep_city' => 'Vancouver (YVR)',
            'dest_city' => 'Tokyo (HND)',
            'cabin_class' => 'business',
            'count_adults' => 2,
            'status' => 'pending',
        ]);

        FlightInquiry::create([
            'full_name' => 'Beatrice Dupont',
            'email' => 'bdupont@montrealart.org',
            'trip_type' => 'oneway',
            'dep_city' => 'Montreal (YUL)',
            'dest_city' => 'Paris (CDG)',
            'cabin_class' => 'first',
            'count_adults' => 1,
            'status' => 'quoted',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get('/admin/inquiries');
        $response->assertStatus(200);
        $response->assertSee('Julian Vance');
        $response->assertSee('Beatrice Dupont');

        // Test filter by status
        $pendingFilter = $this->get('/admin/inquiries?status=pending');
        $pendingFilter->assertStatus(200);
        $pendingFilter->assertSee('Julian Vance');
        $pendingFilter->assertDontSee('Beatrice Dupont');

        // Test search by city / airport
        $searchRes = $this->get('/admin/inquiries?search=Tokyo');
        $searchRes->assertStatus(200);
        $searchRes->assertSee('Julian Vance');
        $searchRes->assertDontSee('Beatrice Dupont');
    }

    /**
     * Test inquiry detail view displays all submitted fields.
     */
    public function test_inquiry_detail_view_shows_all_data(): void
    {
        $inquiry = FlightInquiry::create([
            'full_name' => 'Lord Harrison Sterling',
            'email' => 'hsterling@mayfairconcierge.co.uk',
            'phone' => '+44 20 7946 0912',
            'trip_type' => 'roundtrip',
            'traveller_type' => 'corporate',
            'cabin_class' => 'first',
            'preferred_airline' => 'British Airways',
            'dep_city' => 'London Heathrow (LHR)',
            'dest_city' => 'New York JFK',
            'dep_date' => '2026-11-10',
            'return_date' => '2026-11-20',
            'count_adults' => 2,
            'count_children' => 1,
            'count_infants' => 0,
            'flex_dates' => true,
            'special_requests' => 'Private chauffeur terminal transfer and window suites.',
            'status' => 'pending',
            'ip_address' => '192.168.1.100',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get("/admin/inquiries/{$inquiry->id}");
        $response->assertStatus(200);
        $response->assertSee('Lord Harrison Sterling');
        $response->assertSee('hsterling@mayfairconcierge.co.uk');
        $response->assertSee('+44 20 7946 0912');
        $response->assertSee('British Airways');
        $response->assertSee('London Heathrow (LHR)');
        $response->assertSee('New York JFK');
        $response->assertSee('Nov 10, 2026');
        $response->assertSee('Nov 20, 2026');
        $response->assertSee('Private chauffeur terminal transfer');
    }

    /**
     * Test status toggle via Fetch API (PATCH).
     */
    public function test_inquiry_status_toggle_via_patch(): void
    {
        $inquiry = FlightInquiry::create([
            'full_name' => 'Marcus Aurelius',
            'email' => 'marcus@rome.it',
            'status' => 'pending',
        ]);

        $this->actingAs($this->admin);

        $response = $this->patchJson("/admin/inquiries/{$inquiry->id}", [
            'status' => 'booked',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'inquiry_id' => $inquiry->id,
            'inquiry_status' => 'booked',
        ]);

        $this->assertDatabaseHas('flight_inquiries', [
            'id' => $inquiry->id,
            'status' => 'booked',
        ]);
    }
}
