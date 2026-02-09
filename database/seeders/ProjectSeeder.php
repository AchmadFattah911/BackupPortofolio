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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Website CRUD Parkir',
                'description' => 'Website backend menggunakan HTML, CSS, PHP, dan Database',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Website Landing Page',
                'description' => 'Website Landing page yang responsive serta tampilan terlihat modern',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
