<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $projectCategories = ProjectCategory::withCount('projects')->latest()->paginate(10);
        return view('admin.project-categories.index', compact('projectCategories'));
    }

    public function create()
    {
        return view('admin.project-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ProjectCategory::create($request->all());

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project Category created successfully.');
    }

    public function show(ProjectCategory $projectCategory)
    {
        $projectCategory->load('projects');
        return view('admin.project-categories.show', compact('projectCategory'));
    }

    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $projectCategory->update($request->all());

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project Category updated successfully.');
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        // Check if category has projects
        if ($projectCategory->projects()->count() > 0) {
            return redirect()->route('admin.project-categories.index')
                ->with('error', 'Cannot delete category that has projects.');
        }

        $projectCategory->delete();

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project Category deleted successfully.');
    }
}
