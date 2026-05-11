<?php

namespace Tests\Feature;

use App\Models\HeroSection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminHeroSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_open_hero_settings(): void
    {
        $this->get(route('admin.hero.edit'))
            ->assertRedirect(route('login'));
    }

    public function test_admin_can_update_homepage_hero_settings(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $payload = [
            'specialist_name' => 'Dilnoza SMM',
            'eyebrow' => 'Instagram / TikTok / personal brand',
            'headline' => 'Kontent strategiya va growth',
            'bio' => 'Bizneslar uchun kontent plan, reels g\'oya va lead olib keladigan SMM tizimini yarataman.',
            'hero_image' => 'images/smm-hero.svg',
            'primary_cta_label' => 'Telegramga yozish',
            'primary_cta_url' => 'https://t.me/dilnoza_smm',
            'secondary_cta_label' => 'Konsultatsiya olish',
            'secondary_cta_url' => '#contact-form',
            'tertiary_cta_label' => 'Portfolio ko\'rish',
            'tertiary_cta_url' => '#projects',
            'achievement_one_value' => '42+',
            'achievement_one_label' => 'loyiha',
            'achievement_two_value' => '5 yil',
            'achievement_two_label' => 'tajriba',
            'achievement_three_value' => '18M+',
            'achievement_three_label' => 'reach',
        ];

        $this->actingAs($admin)
            ->get(route('admin.hero.edit'))
            ->assertOk()
            ->assertSee('Hero sozlamalari');

        $this->actingAs($admin)
            ->put(route('admin.hero.update'), $payload)
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas('hero_sections', [
            'specialist_name' => 'Dilnoza SMM',
            'headline' => 'Kontent strategiya va growth',
            'primary_cta_label' => 'Telegramga yozish',
            'achievement_three_value' => '18M+',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Dilnoza SMM')
            ->assertSee('Kontent strategiya va growth')
            ->assertSee('Telegramga yozish')
            ->assertSee('42+')
            ->assertSee('18M+');
    }

    public function test_homepage_uses_seeded_hero_defaults(): void
    {
        HeroSection::query()->create(HeroSection::defaults());

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('SMM Mutaxassis')
            ->assertSee('Instagram / TikTok / personal brand strategiyasi')
            ->assertSee('25+')
            ->assertSee('10M+');
    }
}
