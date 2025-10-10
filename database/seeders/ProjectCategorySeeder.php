<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;

class ProjectCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        ProjectCategory::insert([
            [
                'name' => 'Web Development',
                'description' => 'Projects related to website and web application development.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Mobile Apps',
                'description' => 'Projects for Android and iOS mobile applications.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'Projects focused on user interface and user experience design.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Branding',
                'description' => 'Brand identity and logo design projects.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Other',
                'description' => 'Miscellaneous or uncategorized projects.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
