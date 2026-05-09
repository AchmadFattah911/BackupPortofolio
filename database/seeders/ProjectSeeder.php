<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Website Portofolio',
                'description' => 'Portofolio sederhana menggunakan HTML dan CSS',
                'url' => 'https://example.com/portofolio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Website Laundry Management',
                'description' => 'Website Laundry Management yang di bekali dengan laravel,vue.js dan database yang sudah saling berinteraksi dengan baik serta memiliki fitur responsive mobile dan tampilan yang modern',
                'url' => 'https://hiswash.my.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Website Landing Page',
                'description' => 'Website Landing page yang responsive serta tampilan terlihat modern',
                'url' => 'https://example.com/landing-page',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
