<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@payroll.test'],
            [
                'name' => 'Admin Payroll',
                'password' => Hash::make('password'),
                'role' => 'admin', // 🔥 INI YANG PENTING
                'email_verified_at' => now(),
            ]
        );
    }
}
