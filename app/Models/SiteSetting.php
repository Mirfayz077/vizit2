<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'phone',
        'telegram',
        'instagram',
        'whatsapp',
        'email',
        'location',
        'consultation_link',
    ];

    public static function defaults(): array
    {
        return [
            'phone' => '+998 90 700 00 00',
            'telegram' => 'https://t.me/username',
            'instagram' => 'https://instagram.com/username',
            'whatsapp' => 'https://wa.me/998907000000',
            'email' => 'hello@smm.uz',
            'location' => 'Toshkent, Uzbekistan',
            'consultation_link' => '#contact-form',
        ];
    }

    public static function singleton(): self
    {
        return self::query()->firstOrCreate([], self::defaults());
    }
}
