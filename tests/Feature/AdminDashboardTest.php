<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\Service;
use App\Models\User;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_dashboard_and_inquiries(): void
    {
        $this->seed(ServiceSeeder::class);

        $admin = User::factory()->create([
            'login' => 'admin_root',
            'password' => 'secret123',
            'is_admin' => true,
        ]);

        $service = Service::query()->firstOrFail();

        Inquiry::query()->create([
            'service_id' => $service->id,
            'name' => 'Samandar',
            'phone' => '+998901112233',
            'email' => 'samandar@example.com',
            'company' => 'DevSuite',
            'preferred_contact' => 'phone',
            'budget_range' => '3000-7000',
            'project_summary' => 'CRM va admin panel uchun yangi loyiha haqida murojaat.',
            'status' => 'new',
        ]);

        $this->post(route('admin.login.store'), [
            'login' => 'admin_root',
            'password' => 'secret123',
        ])->assertRedirect(route('admin.dashboard'));

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Dashboard');

        $this->actingAs($admin)
            ->get(route('admin.inquiries.index'))
            ->assertOk()
            ->assertSee('Samandar')
            ->assertSee($service->title);
    }

    public function test_non_admin_user_cannot_open_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }
}
