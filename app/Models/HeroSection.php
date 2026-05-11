<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'specialist_name',
        'eyebrow',
        'headline',
        'bio',
        'hero_image',
        'primary_cta_label',
        'primary_cta_url',
        'secondary_cta_label',
        'secondary_cta_url',
        'tertiary_cta_label',
        'tertiary_cta_url',
        'achievement_one_value',
        'achievement_one_label',
        'achievement_two_value',
        'achievement_two_label',
        'achievement_three_value',
        'achievement_three_label',
    ];

    public static function defaults(): array
    {
        return [
            'specialist_name' => 'SMM Mutaxassis',
            'eyebrow' => 'SMM strategist / content creator / personal brand',
            'headline' => 'Instagram / TikTok / personal brand strategiyasi',
            'bio' => 'Brendingiz uchun kontent strategiya, reels g\'oyalar, vizual uslub va auditoriyani sotuvga olib keladigan SMM tizimini bir joyda yig\'amiz.',
            'hero_image' => 'images/smm-hero.svg',
            'primary_cta_label' => 'Telegramga yozish',
            'primary_cta_url' => 'https://t.me/username',
            'secondary_cta_label' => 'Konsultatsiya olish',
            'secondary_cta_url' => '#contact-form',
            'tertiary_cta_label' => 'Portfolio ko\'rish',
            'tertiary_cta_url' => '#projects',
            'achievement_one_value' => '25+',
            'achievement_one_label' => 'loyiha',
            'achievement_two_value' => '3 yil',
            'achievement_two_label' => 'tajriba',
            'achievement_three_value' => '10M+',
            'achievement_three_label' => 'reach',
        ];
    }

    public static function singleton(): self
    {
        return self::query()->firstOrCreate([], self::defaults());
    }

    public function toHeroArray(): array
    {
        return [
            'specialist_name' => $this->specialist_name,
            'eyebrow' => $this->eyebrow,
            'headline' => $this->headline,
            'bio' => $this->bio,
            'hero_image' => $this->hero_image,
            'primary_cta_label' => $this->primary_cta_label,
            'primary_cta_url' => $this->primary_cta_url,
            'secondary_cta_label' => $this->secondary_cta_label,
            'secondary_cta_url' => $this->secondary_cta_url,
            'tertiary_cta_label' => $this->tertiary_cta_label,
            'tertiary_cta_url' => $this->tertiary_cta_url,
            'achievements' => [
                [
                    'value' => $this->achievement_one_value,
                    'label' => $this->achievement_one_label,
                ],
                [
                    'value' => $this->achievement_two_value,
                    'label' => $this->achievement_two_label,
                ],
                [
                    'value' => $this->achievement_three_value,
                    'label' => $this->achievement_three_label,
                ],
            ],
        ];
    }
}
