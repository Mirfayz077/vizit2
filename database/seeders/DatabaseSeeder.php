<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ServiceSeeder::class);

        $adminLogin = env('ADMIN_LOGIN', 'admin');
        $adminEmail = env('ADMIN_EMAIL', 'admin@mirsaar.uz');

        $admin = User::query()
            ->where('login', $adminLogin)
            ->orWhere('email', $adminEmail)
            ->first() ?? new User();

        $admin->fill([
            'name' => env('ADMIN_NAME', 'Mirsaar Admin'),
            'login' => $adminLogin,
            'email' => $adminEmail,
            'password' => env('ADMIN_PASSWORD', 'admin12345'),
            'is_admin' => true,
        ]);

        $admin->save();
    }
}
