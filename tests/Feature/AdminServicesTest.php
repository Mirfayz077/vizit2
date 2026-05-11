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
                'title' => 'Instagram yuritish',
                'slug' => '',
                'description' => 'Profil kontenti, stories va reels oqimi.',
                'price' => '450$ dan',
                'icon' => 'instagram',
                'benefit' => 'Profil tartibli va faol yuradi.',
                'sort_order' => 4,
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.services.index'));

        $service = Service::query()->firstOrFail();

        $this->assertSame('instagram-yuritish', $service->slug);

        $this->actingAs($admin)
            ->put(route('admin.services.update', $service), [
                'title' => 'Reels / TikTok content',
                'slug' => 'reels-tiktok-content',
                'description' => 'Yangilangan SMM xizmat tavsifi.',
                'price' => '350$ dan',
                'icon' => 'video',
                'benefit' => 'Short video kontent tizimli chiqadi.',
                'sort_order' => 5,
            ])
            ->assertRedirect(route('admin.services.index'));

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'title' => 'Reels / TikTok content',
            'slug' => 'reels-tiktok-content',
            'price' => '350$ dan',
            'icon' => 'video',
            'benefit' => 'Short video kontent tizimli chiqadi.',
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
