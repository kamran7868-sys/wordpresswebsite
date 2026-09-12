<?php

namespace Tests\Feature\Admin;

use App\Models\DmcRegistration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DmcRegistrationTest extends TestCase
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
        $response = $this->get('/admin/dmc-registrations');
        $response->assertRedirect('/login');

        $dmc = DmcRegistration::create([
            'company_name' => 'Alps DMC',
            'contact_person' => 'Hans Meier',
            'email' => 'hans@alps.ch',
            'phone' => '+41 22 123 4567',
            'country' => 'Switzerland',
            'years_in_operation' => 10,
            'services' => ['Ground Transportation'],
            'status' => 'pending_review',
        ]);

        $detailResponse = $this->get("/admin/dmc-registrations/{$dmc->id}");
        $detailResponse->assertRedirect('/login');
    }

    /**
     * Test DMC list view loads with data, search and status filters.
     */
    public function test_dmc_list_loads_with_filters_and_search(): void
    {
        DmcRegistration::create([
            'company_name' => 'Safari Horizons Serengeti',
            'contact_person' => 'Juma Mwangi',
            'email' => 'partners@safarihorizons.tz',
            'phone' => '+255 27 250 8899',
            'country' => 'Tanzania',
            'years_in_operation' => 15,
            'services' => ['Guided Tours & Sightseeing', 'Bespoke / Luxury Itineraries'],
            'status' => 'approved',
        ]);

        DmcRegistration::create([
            'company_name' => 'Kyoto Imperial Travel Bureau',
            'contact_person' => 'Kenji Takahashi',
            'email' => 'inbound@kyotoimperial.jp',
            'phone' => '+81 75 555 1234',
            'country' => 'Japan',
            'years_in_operation' => 8,
            'services' => ['Accommodation Booking', 'Private VIP Guides'],
            'status' => 'pending_review',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get('/admin/dmc-registrations');
        $response->assertStatus(200);
        $response->assertSee('Safari Horizons Serengeti');
        $response->assertSee('Kyoto Imperial Travel Bureau');

        // Status filter
        $pendingFilter = $this->get('/admin/dmc-registrations?status=pending_review');
        $pendingFilter->assertStatus(200);
        $pendingFilter->assertSee('Kyoto Imperial Travel Bureau');
        $pendingFilter->assertDontSee('Safari Horizons Serengeti');

        // Search by country
        $searchRes = $this->get('/admin/dmc-registrations?search=Tanzania');
        $searchRes->assertStatus(200);
        $searchRes->assertSee('Safari Horizons Serengeti');
        $searchRes->assertDontSee('Kyoto Imperial Travel Bureau');
    }

    /**
     * Test DMC application detail view shows all submitted details.
     */
    public function test_dmc_detail_view_shows_full_application(): void
    {
        $dmc = DmcRegistration::create([
            'company_name' => 'Himalayan Luxury Escapes Ltd',
            'contact_person' => 'Pemba Sherpa',
            'email' => 'ops@himalayanluxury.np',
            'phone' => '+977 1 442 8899',
            'country' => 'Nepal',
            'years_in_operation' => 12,
            'website' => 'https://www.himalayanluxury.np',
            'services' => [
                'Accommodation Booking',
                'Ground Transportation',
                'Guided Tours & Sightseeing',
                'Bespoke / Luxury Itineraries'
            ],
            'details' => 'Premier high-altitude luxury trekking and private helicopter expeditions across the Annapurna and Everest regions.',
            'status' => 'pending_review',
            'ip_address' => '127.0.0.1',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get("/admin/dmc-registrations/{$dmc->id}");
        $response->assertStatus(200);
        $response->assertSee('Himalayan Luxury Escapes Ltd');
        $response->assertSee('Pemba Sherpa');
        $response->assertSee('ops@himalayanluxury.np');
        $response->assertSee('+977 1 442 8899');
        $response->assertSee('Nepal');
        $response->assertSee('12 Years in Operation');
        $response->assertSee('https://www.himalayanluxury.np');
        $response->assertSee('Bespoke / Luxury Itineraries');
        $response->assertSee('Premier high-altitude luxury trekking');
    }

    /**
     * Test status toggle via Fetch API (PATCH).
     */
    public function test_dmc_status_toggle_via_patch(): void
    {
        $dmc = DmcRegistration::create([
            'company_name' => 'Nordic Aurora Expeditions',
            'contact_person' => 'Freja Lind',
            'email' => 'freja@nordicaurora.se',
            'phone' => '+46 8 555 1234',
            'country' => 'Sweden',
            'years_in_operation' => 6,
            'services' => ['Guided Tours & Sightseeing'],
            'status' => 'pending_review',
        ]);

        $this->actingAs($this->admin);

        $response = $this->patchJson("/admin/dmc-registrations/{$dmc->id}", [
            'status' => 'approved',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'dmc_id' => $dmc->id,
            'dmc_status' => 'approved',
        ]);

        $this->assertDatabaseHas('dmc_registrations', [
            'id' => $dmc->id,
            'status' => 'approved',
        ]);
    }
}
