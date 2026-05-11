<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProjectsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_update_and_delete_project(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->post(route('admin.projects.store'), [
                'title' => 'Beauty Growth',
                'slug' => '',
                'label' => 'instagram case',
                'description' => 'Beauty salon uchun SMM case preview.',
                'client_niche' => 'Beauty salon',
                'before_state' => 'Profilda kontent tartibsiz va reach past edi.',
                'work_done' => 'Kontent plan, reels va target testlari qilindi.',
                'result' => '+43% reach',
                'platform' => 'Instagram',
                'image' => 'images/projects/devsuite-crm.svg',
                'theme' => 'bronze',
                'layout' => 'wide',
                'row' => 1,
                'sort_order' => 4,
                'is_featured' => '1',
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.projects.index'));

        $project = Project::query()->firstOrFail();

        $this->assertSame('beauty-growth', $project->slug);
        $this->assertTrue($project->is_featured);

        $this->actingAs($admin)
            ->put(route('admin.projects.update', $project), [
                'title' => 'Cafe Reels',
                'slug' => 'cafe-reels',
                'label' => 'tiktok case',
                'description' => 'Yangilangan SMM case tavsifi.',
                'client_niche' => 'Cafe',
                'before_state' => 'Stories va reels sotuvga ishlamayotgan edi.',
                'work_done' => 'TikTok scriptlar va offer kontenti qilindi.',
                'result' => '2.4x sales',
                'platform' => 'TikTok / Instagram',
                'image' => 'images/projects/codepilot-ai.svg',
                'theme' => 'graphite',
                'layout' => 'centered',
                'row' => 2,
                'sort_order' => 2,
            ])
            ->assertRedirect(route('admin.projects.index'));

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Cafe Reels',
            'slug' => 'cafe-reels',
            'client_niche' => 'Cafe',
            'before_state' => 'Stories va reels sotuvga ishlamayotgan edi.',
            'work_done' => 'TikTok scriptlar va offer kontenti qilindi.',
            'result' => '2.4x sales',
            'platform' => 'TikTok / Instagram',
            'theme' => 'graphite',
            'row' => 2,
            'is_featured' => false,
            'is_active' => false,
        ]);

        $this->actingAs($admin)
            ->delete(route('admin.projects.destroy', $project))
            ->assertRedirect(route('admin.projects.index'));

        $this->assertDatabaseMissing('projects', [
            'id' => $project->id,
        ]);
    }

    public function test_non_admin_user_cannot_open_projects_admin(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $this->actingAs($user)
            ->get(route('admin.projects.index'))
            ->assertForbidden();
    }

    public function test_public_projects_section_can_use_database_projects(): void
    {
        Project::query()->create([
            'title' => 'Edu Lead Case',
            'slug' => 'edu-lead-case',
            'label' => 'education case',
            'description' => 'Admin paneldan kiritilgan SMM keys.',
            'client_niche' => 'Online kurs',
            'before_state' => 'Lead kelishi sust edi.',
            'work_done' => 'Reklama offerlari va lead magnet tayyorlandi.',
            'result' => '120 ta lead',
            'platform' => 'Instagram / Telegram',
            'image' => 'images/projects/devsuite-crm.svg',
            'theme' => 'amber',
            'layout' => 'wide',
            'row' => 1,
            'sort_order' => 1,
            'is_featured' => true,
            'is_active' => true,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Edu Lead Case')
            ->assertSee('Online kurs')
            ->assertSee('120 ta lead');
    }
}
