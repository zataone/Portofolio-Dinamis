@extends('layouts.main')

@section('title', 'Create Project')

@section('content')
<div class="space-y-5 sm:space-y-6">
    <!-- Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Create Project</h1>
            <p class="mt-1 text-sm text-gray-500">Add a new project to your portfolio</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-4 h-4 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Projects
            </a>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <!-- Project Name -->
            <div>
                <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
                <input type="text" name="project_name" id="project_name" value="{{ old('project_name') }}" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('project_name') border-red-500 @enderror">
                @error('project_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('category_id') border-red-500 @enderror">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Thumbnail -->
            <div>
                <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('thumbnail') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload a thumbnail image for your project (max 2MB)</p>
                @error('thumbnail')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Main Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Main Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('image') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload a main image for your project (max 2MB)</p>
                @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Short Description -->
            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                <textarea name="short_description" id="short_description" rows="3" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('short_description') border-red-500 @enderror">{{ old('short_description') }}</textarea>
                <p class="mt-1 text-sm text-gray-500">A brief description of your project</p>
                @error('short_description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Full Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Full Description</label>
                <textarea name="description" id="description" rows="6" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Detailed description of your project (optional)</p>
                @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.projects.index') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection