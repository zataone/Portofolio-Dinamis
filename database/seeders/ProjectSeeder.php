<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [1,2,3];
        foreach (range(1, 10) as $i) {
            Project::create([
                'category_id' => $categories[array_rand($categories)],
                'project_name' => 'Project Dummy ' . $i,
                'thumbnail' => 'projects/dummy' . $i . '.jpg',
                'image' => 'projects/dummy' . $i . '.jpg',
                'description' => 'Deskripsi lengkap project dummy ' . $i,
                'short_description' => 'Short desc dummy ' . $i,
                'url' => 'https://example.com/project' . $i,
            ]);
        }
    }
}
