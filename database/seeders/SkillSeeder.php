<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // Data skills sesuai list portfolio
        $skills = [
            ['name' => 'Laravel', 'level' => 40],
            ['name' => 'PHP', 'level' => 75],
            ['name' => 'HTML', 'level' => 80],
            ['name' => 'CSS', 'level' => 55],
            ['name' => 'JavaScript', 'level' => 45],
        ];

        // Looping insert ke database
        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
