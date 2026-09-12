<?php

namespace Tests\Feature\Admin;

use App\Models\ContactInquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactManagementTest extends TestCase
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
        $response = $this->get('/admin/contacts');
        $response->assertRedirect('/login');

        $contact = ContactInquiry::create([
            'full_name' => 'Alice Walker',
            'email' => 'alice@walker.com',
            'phone' => '+123456789',
            'subject' => 'General Inquiry',
            'message' => 'Hello there',
            'status' => 'unread',
        ]);

        $detailResponse = $this->get("/admin/contacts/{$contact->id}");
        $detailResponse->assertRedirect('/login');
    }

    /**
     * Test contact messages list view loads with unread visual distinction and filters.
     */
    public function test_contacts_list_loads_with_filters_and_unread_highlight(): void
    {
        $unreadContact = ContactInquiry::create([
            'full_name' => 'Victoria Kensington',
            'email' => 'vkensington@luxuryvoyages.co.uk',
            'phone' => '+44 20 8899 0011',
            'subject' => 'Cruises',
            'message' => 'Seeking private charter availability for the Mediterranean.',
            'status' => 'unread',
        ]);

        $repliedContact = ContactInquiry::create([
            'full_name' => 'Jean-Luc Picard',
            'email' => 'jlpicard@starfleet.org',
            'phone' => '+33 1 44 55 66 77',
            'subject' => 'Holiday Packages',
            'message' => 'Interested in vineyard expeditions in Bordeaux.',
            'status' => 'replied',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get('/admin/contacts');
        $response->assertStatus(200);
        $response->assertSee('Victoria Kensington');
        $response->assertSee('Jean-Luc Picard');
        $response->assertSee('unread-row'); // Visual distinction class
        $response->assertSee('unread-indicator'); // Gold dot indicator

        // Filter by Status
        $unreadFilter = $this->get('/admin/contacts?status=unread');
        $unreadFilter->assertStatus(200);
        $unreadFilter->assertSee('Victoria Kensington');
        $unreadFilter->assertDontSee('Jean-Luc Picard');

        // Filter by Subject
        $subjectFilter = $this->get('/admin/contacts?subject=Cruises');
        $subjectFilter->assertStatus(200);
        $subjectFilter->assertSee('Victoria Kensington');
        $subjectFilter->assertDontSee('Jean-Luc Picard');
    }

    /**
     * Test contact message detail view shows all submitted fields.
     */
    public function test_contact_detail_view_shows_message_body(): void
    {
        $contact = ContactInquiry::create([
            'full_name' => 'Evelyn St. Claire',
            'email' => 'estclaire@monaco-invest.mc',
            'phone' => '+377 98 06 20 00',
            'subject' => 'Bespoke Private Itineraries',
            'message' => 'We wish to arrange an exclusive 14-day helicopter and yacht itinerary.',
            'status' => 'unread',
            'ip_address' => '127.0.0.1',
        ]);

        $this->actingAs($this->admin);

        $response = $this->get("/admin/contacts/{$contact->id}");
        $response->assertStatus(200);
        $response->assertSee('Evelyn St. Claire');
        $response->assertSee('estclaire@monaco-invest.mc');
        $response->assertSee('+377 98 06 20 00');
        $response->assertSee('Bespoke Private Itineraries');
        $response->assertSee('We wish to arrange an exclusive 14-day helicopter and yacht itinerary.');
    }

    /**
     * Test status toggle via Fetch API (PATCH).
     */
    public function test_contact_status_toggle_via_patch(): void
    {
        $contact = ContactInquiry::create([
            'full_name' => 'Robert Langdon',
            'email' => 'rlangdon@harvard.edu',
            'phone' => '+1 617 555 0142',
            'subject' => 'General Inquiry',
            'message' => 'Inquiring about European historic tours.',
            'status' => 'unread',
        ]);

        $this->actingAs($this->admin);

        $response = $this->patchJson("/admin/contacts/{$contact->id}", [
            'status' => 'in_progress',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'contact_id' => $contact->id,
            'contact_status' => 'in_progress',
        ]);

        $this->assertDatabaseHas('contact_inquiries', [
            'id' => $contact->id,
            'status' => 'in_progress',
        ]);
    }
}
