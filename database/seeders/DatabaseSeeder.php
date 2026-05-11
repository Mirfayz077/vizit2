<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(HeroSectionSeeder::class);
        $this->call(SiteSettingSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ProjectSeeder::class);
    }
}
