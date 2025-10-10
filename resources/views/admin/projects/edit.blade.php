@extends('layouts.main')

@section('title', 'Edit Project')

@section('content')
<div class="space-y-5 sm:space-y-6">
    <!-- Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Edit Project</h1>
            <p class="mt-1 text-sm text-gray-500">Update your project information</p>
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
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            <!-- Project Name -->
            <div class="mb-6">
                <label for="project_name" class="block text-sm font-semibold text-gray-900 mb-1">Project Name</label>
                <input type="text" name="project_name" id="project_name" value="{{ old('project_name', $project->project_name) }}"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 transition-all duration-200 @error('project_name') border-red-500 ring-red-200 @enderror"
                    placeholder="Enter your project name">
                @error('project_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category_id" class="block text-sm font-semibold text-gray-900 mb-1">Category</label>
                <select name="category_id" id="category_id"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 transition-all duration-200 @error('category_id') border-red-500 ring-red-200 @enderror">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Thumbnail -->
            <div class="mb-6">
                <label for="thumbnail" class="block text-sm font-semibold text-gray-900 mb-1">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('thumbnail') border-red-500 ring-red-200 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload a thumbnail image for your project (max 2MB)</p>
                @error('thumbnail')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Main Images -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-semibold text-gray-900 mb-1">Main Images (Max 5)</label>
                
                <!-- Existing Images -->
                @if($project->images->count())
                <div class="mb-4">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Current Images (<span id="current-count">{{ $project->images->count() }}</span>/5)</h4>
                    <p class="text-xs text-gray-500 mb-2">Click the × button to mark images for removal</p>
                    <div id="existing-images" class="flex flex-row flex-wrap gap-3 overflow-x-auto py-2">
                        @foreach($project->images as $img)
                        <div class="relative flex-none border rounded-lg p-2 bg-white shadow-sm transition-all duration-200" style="width: 6rem; position: relative;" data-image-id="{{ $img->id }}">
                            <img src="{{ asset('storage/' . $img->path) }}" alt="image" class="w-full h-16 object-cover rounded mb-2 transition-all duration-200">
                            <button type="button" 
                                class="remove-existing-btn" 
                                style="position: absolute; top: -8px; right: -8px; width: 24px; height: 24px; background-color: #ef4444; color: white; border-radius: 50%; font-size: 12px; font-weight: bold; border: 2px solid white; display: flex; align-items: center; justify-content: center; cursor: pointer; z-index: 20; box-shadow: 0 2px 4px rgba(0,0,0,0.2);" 
                                title="Remove image"
                                onmouseover="this.style.backgroundColor='#dc2626'"
                                onmouseout="this.style.backgroundColor='#ef4444'">×</button>
                            <div class="text-xs text-center text-gray-600">Current</div>
                            <input type="checkbox" name="remove_images[]" value="{{ $img->id }}" class="hidden remove-checkbox">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Upload New Images -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Add New Images</h4>
                    <input type="file" name="image[]" id="image" accept="image/*" multiple
                        class="block w-full border border-gray-300 rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('image') border-red-500 ring-red-200 @enderror">
                    <p class="mt-1 text-sm text-gray-500">Upload new images (each max 2MB). Total must not exceed 5 images.</p>
                    @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Images Preview -->
                <div id="new-images-preview" class="mt-4 flex flex-row flex-wrap gap-3 overflow-x-auto py-2"></div>
                
                <!-- Total Count Display -->
                <div id="image-count-info" class="mt-2 text-sm">
                    <span class="text-gray-600">Total images: </span>
                    <span id="total-count" class="font-medium">{{ $project->images->count() }}</span>/5
                </div>
                
                <p id="image-preview-error" class="mt-2 text-sm text-red-600 hidden">Total images cannot exceed 5.</p>
            </div>

            <!-- Short Description -->
            <div class="mb-6">
                <label for="short_description" class="block text-sm font-semibold text-gray-900 mb-1">Short Description</label>
                <textarea name="short_description" id="short_description" rows="3"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 transition-all duration-200 resize-none @error('short_description') border-red-500 ring-red-200 @enderror"
                    placeholder="A brief description of your project">{{ old('short_description', $project->short_description) }}</textarea>
                <p class="mt-1 text-sm text-gray-500">A brief description of your project</p>
                @error('short_description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Full Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-semibold text-gray-900 mb-1">Full Description</label>
                <textarea name="description" id="description" rows="6"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 transition-all duration-200 resize-none @error('description') border-red-500 ring-red-200 @enderror"
                    placeholder="Detailed description of your project (optional)">{{ old('description', $project->description) }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Detailed description of your project (optional)</p>
                @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Project URL -->
            <div class="mb-6">
                <label for="url" class="block text-sm font-semibold text-gray-900 mb-1">Project URL</label>
                <input type="text" name="url" id="url" value="{{ old('url', $project->url) }}"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 transition-all duration-200 @error('url') border-red-500 ring-red-200 @enderror"
                    placeholder="https://yourproject.com">
                <p class="mt-1 text-sm text-gray-500">Link project dapat berupa Drive, YouTube, Figma, atau Website.</p>
                @error('url')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.projects.index') }}"
                   class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('image');
    const newPreview = document.getElementById('new-images-preview');
    const errorMsg = document.getElementById('image-preview-error');
    const currentCountEl = document.getElementById('current-count');
    const totalCountEl = document.getElementById('total-count');
    const existingImagesContainer = document.getElementById('existing-images');
    
    let initialCount = {{ $project->images->count() }};
    let removedCount = 0;
    let newFilesCount = 0;

    function updateCounts() {
        const currentCount = initialCount - removedCount;
        const totalCount = currentCount + newFilesCount;
        
        if (currentCountEl) currentCountEl.textContent = currentCount;
        totalCountEl.textContent = totalCount;
        
        // Update color based on total
        if (totalCount > 5) {
            totalCountEl.className = 'font-medium text-red-600';
            errorMsg.classList.remove('hidden');
        } else if (totalCount === 5) {
            totalCountEl.className = 'font-medium text-green-600';
            errorMsg.classList.add('hidden');
        } else {
            totalCountEl.className = 'font-medium text-blue-600';
            errorMsg.classList.add('hidden');
        }
    }

    // Handle existing image removal with event delegation
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-existing-btn')) {
            e.preventDefault();
            e.stopPropagation();
            
            const container = e.target.closest('[data-image-id]');
            const checkbox = container.querySelector('.remove-checkbox');
            const button = e.target;
            
            if (container.style.opacity === '0.5') {
                // Restore image
                container.style.opacity = '1';
                container.style.filter = 'none';
                button.textContent = '×';
                button.title = 'Remove image';
                button.style.backgroundColor = '#ef4444';
                checkbox.checked = false;
                removedCount--;
                
                // Update label
                const label = container.querySelector('.text-xs');
                if (label) label.textContent = 'Current';
                
            } else {
                // Mark for removal
                container.style.opacity = '0.5';
                container.style.filter = 'grayscale(100%)';
                button.textContent = '↶';
                button.title = 'Restore image';
                button.style.backgroundColor = '#16a34a';
                checkbox.checked = true;
                removedCount++;
                
                // Update label
                const label = container.querySelector('.text-xs');
                if (label) label.textContent = 'Will Remove';
            }
            
            updateCounts();
        }
    });

    // Handle new file selection with remove functionality
    input.addEventListener('change', function () {
        newPreview.innerHTML = '';
        const files = Array.from(input.files || []);
        newFilesCount = files.length;
        
        updateCounts();
        
        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative flex-none border rounded-lg p-2 bg-blue-50 border-blue-200';
                wrapper.style.width = '6rem';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-16 object-cover rounded mb-2';
                
                // Add remove button for new images
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.textContent = '×';
                removeBtn.title = 'Remove new image';
                removeBtn.style.cssText = 'position: absolute; top: -8px; right: -8px; width: 24px; height: 24px; background-color: #ef4444; color: white; border-radius: 50%; font-size: 12px; font-weight: bold; border: 2px solid white; display: flex; align-items: center; justify-content: center; cursor: pointer; z-index: 20; box-shadow: 0 2px 4px rgba(0,0,0,0.2);';
                removeBtn.onclick = function() {
                    wrapper.remove();
                    // Reset file input to remove this file
                    const dt = new DataTransfer();
                    const fileList = Array.from(input.files);
                    fileList.forEach((f, i) => {
                        if (i !== index) dt.items.add(f);
                    });
                    input.files = dt.files;
                    newFilesCount--;
                    updateCounts();
                };
                
                const label = document.createElement('div');
                label.className = 'text-xs text-center text-blue-600 font-medium';
                label.textContent = `New ${index + 1}`;
                
                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                wrapper.appendChild(label);
                newPreview.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    });

    // Initial count update
    updateCounts();
    
    console.log('Edit form initialized with', initialCount, 'existing images');
});
</script>
@endpush
