<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminLogin = env('ADMIN_LOGIN', 'admin');
        $adminEmail = env('ADMIN_EMAIL', 'admin@gentech.uz');

        $admin = User::query()
            ->where('login', $adminLogin)
            ->orWhere('email', $adminEmail)
            ->first() ?? new User();

        $admin->fill([
            'name' => env('ADMIN_NAME', 'Gentech Admin'),
            'login' => $adminLogin,
            'email' => $adminEmail,
            'password' => env('ADMIN_PASSWORD', 'Admin@2026'),
            'is_admin' => true,
        ]);

        $admin->save();
    }
}
