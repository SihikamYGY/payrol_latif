<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // firstOrCreate: aman dijalankan berkali-kali, tidak error jika email sudah ada
        User::firstOrCreate(
            ['email' => 'admin@payroll.test'],
            [
                'name' => 'Admin Payroll',
                'password' => Hash::make('password'),
                'email_verified_at' => now(), // ← wajib! tanpa ini admin tidak bisa login jika verifikasi email aktif
            ]
        );
    }
}
