<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Sub Kelompok Keahlian
        $this->call([
            SubKkSeeder::class,
        ]);

        // 1. Admin Mutlak (Super Admin) - Tidak bisa mendaftar via web
        User::updateOrCreate([
            'name' => 'Admin EEAT',
            'email' => env('ADMIN_EMAIL', 'adminkkeeats@gmail.com'),
            'password' => \Illuminate\Support\Facades\Hash::make(env('ADMIN_PASSWORD', '12345678')),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
