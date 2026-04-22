<?php

namespace Tests\Feature;

use App\Livewire\ProjectContactPage;
use App\Models\Service;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectContactPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_contacts_page_returns_a_successful_response(): void
    {
        $this->get('/contacts')
            ->assertOk()
            ->assertSee('Brief forma', false);
    }

    public function test_visitor_can_submit_inquiry_from_contacts_page(): void
    {
        $this->seed(ServiceSeeder::class);

        $service = Service::query()->firstOrFail();

        Livewire::test(ProjectContactPage::class)
            ->set('service_id', (string) $service->id)
            ->set('name', 'Kamola')
            ->set('phone', '+998901112233')
            ->set('email', 'kamola@example.com')
            ->set('company', 'Mirsaar Brief')
            ->set('preferred_contact', 'telegram')
            ->set('budget_range', '8600')
            ->set('project_summary', 'Alohida contacts page orqali brief yuboryapman va CRM bilan premium sayt kerak.')
            ->call('submitInquiry')
            ->assertHasNoErrors()
            ->assertSet('inquirySent', true);

        $this->assertDatabaseHas('inquiries', [
            'service_id' => $service->id,
            'name' => 'Kamola',
            'phone' => '+998901112233',
            'email' => 'kamola@example.com',
            'company' => 'Mirsaar Brief',
            'preferred_contact' => 'telegram',
            'budget_range' => '8600',
        ]);
    }
}
