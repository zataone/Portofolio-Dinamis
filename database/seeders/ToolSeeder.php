<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            ['name' => 'VS Code', 'logo' => 'tools/vscode.png'],
            ['name' => 'Git', 'logo' => 'tools/git.png'],
            ['name' => 'Postman', 'logo' => 'tools/postman.png'],
            ['name' => 'Figma', 'logo' => 'tools/figma.png'],
            ['name' => 'Docker', 'logo' => 'tools/docker.png'],
        ];
        foreach ($tools as $tool) {
            Tool::create($tool);
        }
    }
}
