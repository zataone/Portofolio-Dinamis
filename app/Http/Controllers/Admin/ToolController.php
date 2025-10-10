<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::latest()->paginate(10);
        return view('admin.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('tools/logos', 'public');
        }

        Tool::create($data);

        return redirect()->route('admin.tools.index')
            ->with('success', 'Tool created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        return view('admin.tools.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        return view('admin.tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($tool->logo) {
                Storage::disk('public')->delete($tool->logo);
            }
            $data['logo'] = $request->file('logo')->store('tools/logos', 'public');
        }

        $tool->update($data);

        return redirect()->route('admin.tools.index')
            ->with('success', 'Tool updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        // Delete logo file
        if ($tool->logo) {
            Storage::disk('public')->delete($tool->logo);
        }

        $tool->delete();

        return redirect()->route('admin.tools.index')
            ->with('success', 'Tool deleted successfully.');
    }
}
