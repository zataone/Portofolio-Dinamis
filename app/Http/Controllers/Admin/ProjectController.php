<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('category')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'project_name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:project_categories,id',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'required|array|min:5|max:5', // exactly 5 images required
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'short_description' => 'required|string',
        ]);

    $data = $request->only(['project_name', 'category_id', 'description', 'short_description', 'url']);
    // ensure image column has a value (nullable migration may not be run yet)
    $data['image'] = null;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('projects/thumbnails', 'public');
        }

        $project = Project::create($data);

        // Handle exactly 5 main images
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            
            foreach ($images as $img) {
                $path = $img->store('projects/images', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $request->validate([
            'project_name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:project_categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'short_description' => 'required|string',
        ]);

        $data = $request->only(['project_name', 'category_id', 'description', 'short_description', 'url']);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('projects/thumbnails', 'public');
        }

        $project->update($data);

        // Handle removal of images first (checkboxes)
        $removedCount = 0;
        if ($request->filled('remove_images')) {
            $toRemove = $request->input('remove_images', []);
            foreach ($toRemove as $imgId) {
                $img = ProjectImage::find($imgId);
                if ($img && $img->project_id == $project->id) {
                    Storage::disk('public')->delete($img->path);
                    $img->delete();
                    $removedCount++;
                }
            }
        }

        // Handle new main images (enforce max 5 total after removal)
        if ($request->hasFile('image')) {
            $currentCount = $project->images()->count(); // count after removal
            $newImages = $request->file('image');
            
            if ($currentCount + count($newImages) > 5) {
                return redirect()->back()->withErrors(['image' => 'Total images cannot exceed 5. You currently have ' . $currentCount . ' images.'])->withInput();
            }
            
            foreach ($newImages as $img) {
                $path = $img->store('projects/images', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete thumbnail
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        // Delete related images
        foreach ($project->images as $img) {
            Storage::disk('public')->delete($img->path);
            $img->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
