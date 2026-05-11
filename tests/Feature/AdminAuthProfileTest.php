<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeded_admin_can_login_with_login_and_password(): void
    {
        $this->seed(UserSeeder::class);

        $this->post(route('admin.login.store'), [
            'login' => 'admin',
            'password' => 'Admin@2026',
        ])
            ->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticated();
    }

    public function test_seeded_admin_can_login_with_email_and_password(): void
    {
        $this->seed(UserSeeder::class);

        $this->post(route('admin.login.store'), [
            'login' => 'admin@gentech.uz',
            'password' => 'Admin@2026',
        ])
            ->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticated();
    }

    public function test_non_admin_user_cannot_login_to_admin_panel(): void
    {
        User::factory()->create([
            'login' => 'client',
            'email' => 'client@example.com',
            'password' => 'ClientPass123',
            'is_admin' => false,
        ]);

        $this->post(route('admin.login.store'), [
            'login' => 'client',
            'password' => 'ClientPass123',
        ])
            ->assertSessionHasErrors('login')
            ->assertRedirect();

        $this->assertGuest();
    }

    public function test_guest_cannot_open_admin_profile(): void
    {
        $this->get(route('admin.profile.show'))
            ->assertRedirect(route('login'));
    }

    public function test_admin_can_update_profile_and_password(): void
    {
        $admin = User::factory()->create([
            'name' => 'Old Admin',
            'login' => 'old_admin',
            'email' => 'old.admin@example.com',
            'password' => 'OldPass123',
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.profile.show'))
            ->assertOk()
            ->assertSee('User Profile');

        $this->actingAs($admin)
            ->put(route('admin.profile.update'), [
                'name' => 'Gentech Owner',
                'login' => 'gentech_owner',
                'email' => 'owner@gentech.uz',
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('users', [
            'id' => $admin->id,
            'name' => 'Gentech Owner',
            'login' => 'gentech_owner',
            'email' => 'owner@gentech.uz',
        ]);

        $this->actingAs($admin->refresh())
            ->put(route('admin.profile.password'), [
                'current_password' => 'OldPass123',
                'password' => 'NewPass123',
                'password_confirmation' => 'NewPass123',
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertTrue(Hash::check('NewPass123', $admin->refresh()->password));
    }

    public function test_admin_profile_menu_links_and_logout_work(): void
    {
        $admin = User::factory()->create([
            'name' => 'Menu Admin',
            'login' => 'menu_admin',
            'email' => 'menu.admin@example.com',
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Menu Admin')
            ->assertSee('Profil sozlamalari')
            ->assertSee('Parolni almashtirish')
            ->assertSee('Chiqish');

        $this->actingAs($admin)
            ->post(route('admin.logout'))
            ->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }
}
