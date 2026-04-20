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
                'title' => 'Premium Landing Page',
                'description' => 'Konversiya va premium first impression uchun landing page.',
                'sort_order' => 1,
            ],
            [
                'title' => 'DevSuite CRM',
                'description' => 'Ichki jarayonlar, lead boshqaruvi va admin oqimi uchun CRM.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Admin Dashboard',
                'description' => 'Monitoring, reporting va operatsion boshqaruv paneli.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Corporate Website',
                'description' => 'Kompaniya imiji va xizmatlarini premium taqdim etuvchi sayt.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Premium Support',
                'description' => 'Ishga tushgandan keyin tezkor kuzatuv va support.',
                'sort_order' => 5,
            ],
            [
                'title' => 'Brand Refresh',
                'description' => 'Mavjud loyiha uchun vizual va UX qayta yig\'ish.',
                'sort_order' => 6,
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
            ->where('slug', 'nfc-vizitka')
            ->update([
                'is_active' => false,
                'sort_order' => 999,
            ]);
    }
}
