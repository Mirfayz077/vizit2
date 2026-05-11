<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSiteSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_update_contact_settings(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->put(route('admin.settings.update'), [
                'phone' => '+998 90 111 22 33',
                'telegram' => 'https://t.me/smmpro',
                'instagram' => 'https://instagram.com/smmpro',
                'whatsapp' => 'https://wa.me/998901112233',
                'email' => 'hello@smmpro.uz',
                'location' => 'Toshkent, Uzbekistan',
                'consultation_link' => '#contact-form',
            ])
            ->assertRedirect(route('admin.settings.edit'));

        $this->assertDatabaseHas('site_settings', [
            'phone' => '+998 90 111 22 33',
            'telegram' => 'https://t.me/smmpro',
            'instagram' => 'https://instagram.com/smmpro',
            'whatsapp' => 'https://wa.me/998901112233',
            'email' => 'hello@smmpro.uz',
            'location' => 'Toshkent, Uzbekistan',
            'consultation_link' => '#contact-form',
        ]);

        $this->assertSame('hello@smmpro.uz', SiteSetting::singleton()->email);
    }

    public function test_non_admin_user_cannot_open_contact_settings(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $this->actingAs($user)
            ->get(route('admin.settings.edit'))
            ->assertForbidden();
    }
}
