<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminServicesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_update_and_delete_service(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->post(route('admin.services.store'), [
                'title' => 'Portfolio Website',
                'slug' => '',
                'description' => 'Kompaniya uchun premium showcase sayt.',
                'sort_order' => 4,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.services.index'));

        $service = Service::query()->firstOrFail();

        $this->assertSame('portfolio-website', $service->slug);

        $this->actingAs($admin)
            ->put(route('admin.services.update', $service), [
                'title' => 'Platform Website',
                'slug' => 'platform-website',
                'description' => 'Yangilangan xizmat tavsifi.',
                'sort_order' => 5,
            ])
            ->assertRedirect(route('admin.services.index'));

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'title' => 'Platform Website',
            'slug' => 'platform-website',
            'is_active' => false,
            'sort_order' => 5,
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.services.destroy', $service))
            ->assertRedirect(route('admin.services.index'));

        $this->assertDatabaseMissing('services', [
            'id' => $service->id,
        ]);
    }

    public function test_non_admin_user_cannot_open_services_admin(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $this->actingAs($user)
            ->get(route('admin.services.index'))
            ->assertForbidden();
    }
}
