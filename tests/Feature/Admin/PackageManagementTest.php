<?php

namespace Tests\Feature\Admin;

use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PackageManagementTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    /**
     * Test unauthenticated users are blocked from package management routes.
     */
    public function test_unauthenticated_users_are_blocked(): void
    {
        $response = $this->get('/admin/packages');
        $response->assertRedirect('/login');

        $createResponse = $this->get('/admin/packages/create');
        $createResponse->assertRedirect('/login');

        $postResponse = $this->post('/admin/packages', []);
        $postResponse->assertRedirect('/login');
    }

    /**
     * Test package listing view loads for authenticated admin with filters.
     */
    public function test_package_list_loads_with_filters_and_search(): void
    {
        Package::create([
            'slug' => 'canadian-rockies-express',
            'title' => 'Canadian Rockies Express',
            'category' => 'holiday',
            'country' => 'Canada',
            'duration_days' => 8,
            'short_description' => 'A luxury train adventure.',
            'featured_image' => '/assets/test.jpg',
            'status' => 'published',
        ]);

        Package::create([
            'slug' => 'alaskan-fjords-cruise',
            'title' => 'Alaskan Fjords Cruise',
            'category' => 'cruise',
            'country' => 'USA',
            'duration_days' => 10,
            'short_description' => 'A scenic voyage.',
            'featured_image' => '/assets/test.jpg',
            'status' => 'draft',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get('/admin/packages');
        $response->assertStatus(200);
        $response->assertSee('Canadian Rockies Express');
        $response->assertSee('Alaskan Fjords Cruise');

        // Test category filter
        $filterCat = $this->get('/admin/packages?category=cruise');
        $filterCat->assertStatus(200);
        $filterCat->assertSee('Alaskan Fjords Cruise');
        $filterCat->assertDontSee('Canadian Rockies Express');

        // Test status filter
        $filterStatus = $this->get('/admin/packages?status=draft');
        $filterStatus->assertStatus(200);
        $filterStatus->assertSee('Alaskan Fjords Cruise');
        $filterStatus->assertDontSee('Canadian Rockies Express');

        // Test search
        $searchRes = $this->get('/admin/packages?search=Canada');
        $searchRes->assertStatus(200);
        $searchRes->assertSee('Canadian Rockies Express');
        $searchRes->assertDontSee('Alaskan Fjords Cruise');
    }

    /**
     * Test create package for all 3 categories (Holiday, Cruise, Hotel) with JSON structures.
     */
    public function test_create_package_for_all_three_categories(): void
    {
        $this->actingAs($this->admin);

        // 1. Holiday Package
        $holidayData = [
            'category' => 'holiday',
            'title' => 'Golden Triangle Private Luxury Tour',
            'slug' => 'golden-triangle-private-luxury-tour',
            'country' => 'India',
            'region' => 'south-asia',
            'duration_days' => 7,
            'duration_nights' => 6,
            'price_from' => 6500.00,
            'currency' => 'USD',
            'short_description' => 'Private palace expedition across Delhi, Agra, and Jaipur.',
            'status' => 'published',
            'tags' => ['Heritage', 'Palace', 'Private Concierge'],
            'features' => [
                ['icon' => 'star', 'label' => '5-Star Oberoi Heritage Palaces'],
                ['icon' => 'compass', 'label' => 'Private Historian Guide'],
            ],
            'itinerary' => [
                [
                    'day' => 1,
                    'title' => 'Arrival in New Delhi',
                    'location' => 'New Delhi',
                    'description' => 'VIP airport welcome and transfer to The Imperial.',
                    'meals' => ['D']
                ]
            ],
            'highlights' => ['Sunrise Taj Mahal private tour', 'Jaipur hot air balloon excursion'],
            'inclusions' => ['Private chauffeur', 'All monument entry fees'],
        ];

        $resHoliday = $this->post('/admin/packages', $holidayData);
        $resHoliday->assertRedirect('/admin/packages');
        $this->assertDatabaseHas('packages', [
            'slug' => 'golden-triangle-private-luxury-tour',
            'category' => 'holiday',
            'country' => 'India',
        ]);

        // 2. Cruise / Voyage
        $cruiseData = [
            'category' => 'cruise',
            'title' => 'Norwegian Fjords Ultra-Luxury Voyage',
            'slug' => 'norwegian-fjords-ultra-luxury-voyage',
            'country' => 'Norway',
            'region' => 'europe',
            'duration_days' => 11,
            'duration_nights' => 10,
            'price_from' => 12500.00,
            'currency' => 'EUR',
            'short_description' => 'Exclusive small-ship voyage through the UNESCO Geirangerfjord.',
            'status' => 'draft',
            'itinerary' => [
                [
                    'day' => 1,
                    'title' => 'Bergen Embarkation',
                    'location' => 'Bergen Harbor',
                    'description' => 'Boarding and champagne reception.',
                    'meals' => ['D']
                ]
            ],
        ];

        $resCruise = $this->post('/admin/packages', $cruiseData);
        $resCruise->assertRedirect('/admin/packages');
        $this->assertDatabaseHas('packages', [
            'slug' => 'norwegian-fjords-ultra-luxury-voyage',
            'category' => 'cruise',
            'status' => 'draft',
        ]);

        // 3. Hotel Stay
        $hotelData = [
            'category' => 'hotel',
            'title' => 'Amangiri Desert Sanctuary & Spa',
            'slug' => 'amangiri-desert-sanctuary-spa',
            'country' => 'USA',
            'region' => 'north-america',
            'duration_days' => 4,
            'duration_nights' => 3,
            'price_from' => 4200.00,
            'currency' => 'USD',
            'short_description' => 'Iconic desert retreat in Canyon Point, Utah.',
            'status' => 'published',
            'room_types' => [
                [
                    'name' => 'Desert View Suite',
                    'meta' => 'Sleeps 2 · King Bed · 93m²',
                    'description' => 'Private outdoor lounge with desert panorama and plunge pool.'
                ]
            ],
        ];

        $resHotel = $this->post('/admin/packages', $hotelData);
        $resHotel->assertRedirect('/admin/packages');
        $this->assertDatabaseHas('packages', [
            'slug' => 'amangiri-desert-sanctuary-spa',
            'category' => 'hotel',
        ]);
    }

    /**
     * Test package validation requires fields and unique slug.
     */
    public function test_package_validation_rules(): void
    {
        $this->actingAs($this->admin);

        $response = $this->post('/admin/packages', []);
        $response->assertSessionHasErrors(['category', 'title', 'slug', 'duration_days', 'short_description']);

        Package::create([
            'slug' => 'existing-unique-slug',
            'title' => 'Existing Package',
            'category' => 'holiday',
            'duration_days' => 5,
            'short_description' => 'Test',
            'featured_image' => '/assets/test.jpg',
            'status' => 'published',
        ]);

        $duplicateResponse = $this->post('/admin/packages', [
            'category' => 'holiday',
            'title' => 'Duplicate Slug Test',
            'slug' => 'existing-unique-slug',
            'duration_days' => 5,
            'short_description' => 'Test',
        ]);
        $duplicateResponse->assertSessionHasErrors(['slug']);
    }

    /**
     * Test live AJAX slug uniqueness check endpoint.
     */
    public function test_ajax_slug_uniqueness_check(): void
    {
        Package::create([
            'slug' => 'taken-slug-example',
            'title' => 'Taken Title',
            'category' => 'holiday',
            'duration_days' => 3,
            'short_description' => 'Test',
            'featured_image' => '/assets/test.jpg',
            'status' => 'published',
        ]);

        $this->actingAs($this->admin);

        // Taken slug
        $resTaken = $this->getJson('/admin/packages/check-slug?slug=taken-slug-example');
        $resTaken->assertStatus(200);
        $resTaken->assertJson(['available' => false]);

        // Available slug
        $resAvail = $this->getJson('/admin/packages/check-slug?slug=fresh-new-unheard-slug');
        $resAvail->assertStatus(200);
        $resAvail->assertJson(['available' => true]);
    }

    /**
     * Test image upload storage.
     */
    public function test_package_hero_and_gallery_image_upload(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $heroFile = UploadedFile::fake()->image('hero-rockies.jpg', 1200, 800);
        $galleryFile = UploadedFile::fake()->image('gallery-rockies.jpg', 1200, 800);

        $payload = [
            'category' => 'holiday',
            'title' => 'Rocky Mountaineer Photo Tour',
            'slug' => 'rocky-mountaineer-photo-tour',
            'duration_days' => 5,
            'short_description' => 'Photography rail journey.',
            'status' => 'published',
            'featured_image_file' => $heroFile,
            'gallery_files' => [$galleryFile],
        ];

        $response = $this->post('/admin/packages', $payload);
        $response->assertRedirect('/admin/packages');

        $pkg = Package::where('slug', 'rocky-mountaineer-photo-tour')->first();
        $this->assertNotNull($pkg);
        $this->assertStringContainsString('packages/', $pkg->featured_image);
        $this->assertNotEmpty($pkg->gallery);
    }

    /**
     * Test status toggle via AJAX PATCH.
     */
    public function test_package_status_toggle(): void
    {
        $package = Package::create([
            'slug' => 'status-toggle-pkg',
            'title' => 'Status Toggle Package',
            'category' => 'holiday',
            'duration_days' => 4,
            'short_description' => 'Testing toggle',
            'featured_image' => '/assets/test.jpg',
            'status' => 'draft',
        ]);

        $this->actingAs($this->admin);

        $response = $this->patchJson("/admin/packages/{$package->id}/status", [
            'status' => 'published',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'package_status' => 'published',
        ]);

        $this->assertDatabaseHas('packages', [
            'id' => $package->id,
            'status' => 'published',
        ]);
    }

    /**
     * Test package deletion via AJAX.
     */
    public function test_package_deletion_ajax(): void
    {
        $package = Package::create([
            'slug' => 'delete-target-pkg',
            'title' => 'Delete Target Package',
            'category' => 'holiday',
            'duration_days' => 2,
            'short_description' => 'To be deleted',
            'featured_image' => '/assets/test.jpg',
            'status' => 'archived',
        ]);

        $this->actingAs($this->admin);

        $response = $this->deleteJson("/admin/packages/{$package->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseMissing('packages', [
            'id' => $package->id,
        ]);
    }

    /**
     * Test dashboard overview counts reflect actual database state.
     */
    public function test_dashboard_overview_counts_reflect_actual_database_state(): void
    {
        Package::create([
            'slug' => 'pkg-published-1',
            'title' => 'Published 1',
            'category' => 'holiday',
            'duration_days' => 3,
            'short_description' => 'Test',
            'featured_image' => '/assets/test.jpg',
            'status' => 'published',
        ]);
        Package::create([
            'slug' => 'pkg-published-2',
            'title' => 'Published 2',
            'category' => 'cruise',
            'duration_days' => 5,
            'short_description' => 'Test',
            'featured_image' => '/assets/test.jpg',
            'status' => 'published',
        ]);
        Package::create([
            'slug' => 'pkg-draft-1',
            'title' => 'Draft 1',
            'category' => 'hotel',
            'duration_days' => 2,
            'short_description' => 'Test',
            'featured_image' => '/assets/test.jpg',
            'status' => 'draft',
        ]);
        Package::create([
            'slug' => 'pkg-archived-1',
            'title' => 'Archived 1',
            'category' => 'holiday',
            'duration_days' => 4,
            'short_description' => 'Test',
            'featured_image' => '/assets/test.jpg',
            'status' => 'archived',
        ]);

        \App\Models\FlightInquiry::create([
            'full_name' => 'Pending Traveler',
            'email' => 'traveler@test.com',
            'status' => 'pending',
        ]);
        \App\Models\FlightInquiry::create([
            'full_name' => 'Booked Traveler',
            'email' => 'booked@test.com',
            'status' => 'booked',
        ]);

        \App\Models\ContactInquiry::create([
            'full_name' => 'Unread Sender',
            'email' => 'unread@test.com',
            'phone' => '+123456789',
            'subject' => 'General Inquiry',
            'message' => 'Unread question',
            'status' => 'unread',
        ]);

        \App\Models\DmcRegistration::create([
            'company_name' => 'Pending Review DMC',
            'contact_person' => 'Agent A',
            'email' => 'dmc@test.com',
            'phone' => '+123456789',
            'country' => 'Canada',
            'years_in_operation' => 5,
            'services' => ['Ground Transportation'],
            'status' => 'pending_review',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get('/admin');
        $response->assertStatus(200);

        // Check package counts: total = 4, published = 2, draft = 1, archived = 1
        $response->assertSee('4'); // Total packages
        $response->assertSee('2 Published');
        $response->assertSee('1 Draft');
        $response->assertSee('1 Archived');

        // Check new flight inquiries (pending = 1)
        $response->assertSee('New Flight Inquiries');
        $response->assertSee('/admin/inquiries?status=pending');

        // Check unread contact messages (unread = 1)
        $response->assertSee('Unread Messages');
        $response->assertSee('/admin/contacts?status=unread');

        // Check pending DMC applications (pending_review = 1)
        $response->assertSee('Pending DMC Apps');
        $response->assertSee('/admin/dmc-registrations?status=pending_review');
    }

    /**
     * Test package listing pagination renders custom PGE controls with no giant SVGs.
     */
    public function test_package_pagination_renders_custom_pge_controls(): void
    {
        // Create 15 packages (page size is 12)
        for ($i = 1; $i <= 15; $i++) {
            Package::create([
                'slug' => 'luxury-tour-' . $i,
                'title' => 'Luxury Tour ' . $i,
                'category' => 'holiday',
                'country' => 'Switzerland',
                'duration_days' => 7,
                'short_description' => 'Tour number ' . $i,
                'featured_image' => '/assets/test.jpg',
                'status' => 'published',
            ]);
        }

        $this->actingAs($this->admin);

        $response = $this->get('/admin/packages');
        $response->assertStatus(200);

        // Assert PGE pagination container and info text
        $response->assertSee('pge-pagination');
        $response->assertSee('Showing <strong>1</strong> to <strong>12</strong> of <strong>15</strong> results', false);

        // Previous button on first page should be disabled
        $response->assertSee('pge-page-item disabled', false);
        $response->assertSee('&laquo; Previous', false);

        // Next button on first page should be active link to page 2
        $response->assertSee('href="http://localhost/admin/packages?page=2"', false);
        $response->assertSee('Next &raquo;', false);

        // Page 2 should render correctly
        $page2Response = $this->get('/admin/packages?page=2');
        $page2Response->assertStatus(200);
        $page2Response->assertSee('Showing <strong>13</strong> to <strong>15</strong> of <strong>15</strong> results', false);
        $page2Response->assertSee('href="http://localhost/admin/packages?page=1"', false);
    }
}

