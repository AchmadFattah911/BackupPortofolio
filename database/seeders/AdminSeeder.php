<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => env('ADMIN_EMAIL', 'admin@gmail.com')
            ],
            [
                'name' => 'Admin Portofolio',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'elliottakeit123@#$')),
                'is_admin' => true,
            ]
        );
    }
}