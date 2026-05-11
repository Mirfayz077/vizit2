<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'SMM strategiya',
                'description' => 'Brend maqsadi, auditoriya, kontent ustunlari va oyma-oy growth yo\'l xaritasi.',
                'price' => '300$ dan',
                'icon' => 'strategy',
                'benefit' => 'Kontent qayerga xizmat qilishi va qanday natija berishi aniq bo\'ladi.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Kontent plan',
                'description' => 'Post, reels, stories, rubrika va captionlar uchun tartibli kontent kalendar.',
                'price' => '200$ dan',
                'icon' => 'calendar',
                'benefit' => 'Jamoa nimani, qachon va nima uchun chiqarishini oldindan biladi.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Instagram yuritish',
                'description' => 'Profil packaging, post/reels joylash, stories ritmi va community management.',
                'price' => '450$ dan',
                'icon' => 'instagram',
                'benefit' => 'Profil faol, ishonchli va sotuvga yaqin ko\'rinishga keladi.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Reels / TikTok content',
                'description' => 'Trendga mos g\'oya, senariy, hook va qisqa video kontent tizimi.',
                'price' => '350$ dan',
                'icon' => 'video',
                'benefit' => 'Reach va profilga kirishlar organik ravishda oshadi.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Target reklama',
                'description' => 'Auditoriya segmentlari, kreativ test, lead generation va campaign optimizatsiya.',
                'price' => '250$ dan',
                'icon' => 'target',
                'benefit' => 'Budjet taxmin bilan emas, test va raqamlar bilan boshqariladi.',
                'sort_order' => 5,
            ],
            [
                'title' => 'Brand packaging',
                'description' => 'Bio, highlights, vizual yo\'nalish, tone of voice va sahifa birinchi taassuroti.',
                'price' => '300$ dan',
                'icon' => 'brand',
                'benefit' => 'Sahifa yangi mijozga darhol professional signal beradi.',
                'sort_order' => 6,
            ],
            [
                'title' => 'Analytics va audit',
                'description' => 'Profil, kontent, reklama va funnel bo\'yicha muammo va imkoniyatlarni topish.',
                'price' => '150$ dan',
                'icon' => 'analytics',
                'benefit' => 'Qaysi kontent ishlayotgani va qayerda pul yo\'qolayotgani ko\'rinadi.',
                'sort_order' => 7,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => Str::slug($service['title'])],
                $service + [
                    'is_active' => true,
                ],
            );
        }

        Service::query()
            ->whereNotIn('slug', collect($services)->pluck('title')->map(fn (string $title) => Str::slug($title))->all())
            ->update([
                'is_active' => false,
                'sort_order' => 999,
            ]);
    }
}
