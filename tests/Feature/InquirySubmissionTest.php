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
            ->set('business_niche', 'Beauty salon')
            ->set('email', 'aziza@example.com')
            ->set('preferred_contact', 'telegram')
            ->set('platform', 'instagram')
            ->set('goal', 'leads')
            ->set('budget_range', '300$ dan')
            ->set('project_summary', 'Instagram yuritish va lead olib kelish uchun SMM brief yuboryapman.')
            ->set('note', 'Reels ham kerak.')
            ->call('submitInquiry')
            ->assertHasNoErrors()
            ->assertSet('inquirySent', true);

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Aziza',
            'phone' => '+998909998877',
            'business_niche' => 'Beauty salon',
            'preferred_contact' => 'telegram',
            'platform' => 'instagram',
            'goal' => 'leads',
            'budget_range' => '300$ dan',
            'note' => 'Reels ham kerak.',
            'service_id' => $service->id,
        ]);
    }
}
