<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Tool;
use App\Models\Brand;
use App\Models\Testimonial;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCategoryStats = ProjectCategory::withCount('projects')->get()->map(function($cat) {
            return [
                'name' => $cat->name,
                'count' => $cat->projects_count
            ];
        })->values()->toArray();

        $data = [
            'total_projects' => Project::count(),
            'total_skills' => Skill::count(),
            'total_tools' => Tool::count(),
            'total_brands' => Brand::count(),
            'total_testimonials' => Testimonial::count(),
            'total_categories' => ProjectCategory::count(),
            'recent_projects' => Project::with('category')->latest()->take(5)->get(),
            'recent_testimonials' => Testimonial::latest()->take(5)->get(),
            'project_category_stats' => $projectCategoryStats,
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}
