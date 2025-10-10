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
        $data = [
            'total_projects' => Project::count(),
            'total_skills' => Skill::count(),
            'total_tools' => Tool::count(),
            'total_brands' => Brand::count(),
            'total_testimonials' => Testimonial::count(),
            'total_categories' => ProjectCategory::count(),
            'recent_projects' => Project::with('category')->latest()->take(5)->get(),
            'recent_testimonials' => Testimonial::latest()->take(5)->get(),
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}
