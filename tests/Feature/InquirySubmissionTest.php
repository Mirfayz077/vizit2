<?php

namespace Tests\Feature;

use App\Livewire\StackShowcase;
use App\Models\Service;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class InquirySubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_visitor_can_submit_inquiry_from_livewire_form(): void
    {
        $this->seed(ServiceSeeder::class);

        $service = Service::query()->firstOrFail();

        Livewire::test(StackShowcase::class)
            ->set('service_id', (string) $service->id)
            ->set('name', 'Aziza')
            ->set('phone', '+998909998877')
            ->set('email', 'aziza@example.com')
            ->set('company', 'Mirsaar Client')
            ->set('preferred_contact', 'telegram')
            ->set('budget_range', '5200')
            ->set('project_summary', 'Premium landing page va admin qismi uchun toliq brief yuboryapman.')
            ->call('submitInquiry')
            ->assertHasNoErrors()
            ->assertSet('inquirySent', true);

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Aziza',
            'phone' => '+998909998877',
            'preferred_contact' => 'telegram',
            'service_id' => $service->id,
        ]);
    }
}
