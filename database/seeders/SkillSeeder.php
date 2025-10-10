<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'logo' => 'skills/laravel.png'],
            ['name' => 'Vue.js', 'logo' => 'skills/vue.png'],
            ['name' => 'Tailwind CSS', 'logo' => 'skills/tailwind.png'],
            ['name' => 'PHP', 'logo' => 'skills/php.png'],
            ['name' => 'JavaScript', 'logo' => 'skills/js.png'],
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
