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
            <div class="mb-6">
                <label for="project_name" class="block text-sm font-semibold text-gray-900 mb-1">Project Name</label>
                <input type="text" name="project_name" id="project_name" value="{{ old('project_name') }}"
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
            <div class="mb-6">
                <label for="thumbnail" class="block text-sm font-semibold text-gray-900 mb-1">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('thumbnail') border-red-500 ring-red-200 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload a thumbnail image for your project (max 2MB)</p>
                @error('thumbnail')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Main Image -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-semibold text-gray-900 mb-1">Main Images (Max 5)</label>
                <input type="file" name="image[]" id="image" accept="image/*" multiple
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('image') border-red-500 ring-red-200 @enderror">
                <p class="mt-1 text-sm text-gray-500">Upload exactly 5 main images for your project (each max 2MB)</p>
                @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div id="image-preview" class="mt-4 flex flex-row flex-nowrap items-start gap-3 overflow-x-auto py-2"></div>
                <div id="image-count" class="mt-2 text-sm text-gray-600">
                    <span id="selected-count">0</span>/5 images selected
                </div>
                <p id="image-preview-error" class="mt-2 text-sm text-red-600 hidden">Please select exactly 5 images.</p>
            </div>

            <!-- Short Description -->
            <div class="mb-6">
                <label for="short_description" class="block text-sm font-semibold text-gray-900 mb-1">Short Description</label>
                <textarea name="short_description" id="short_description" rows="3"
                    class="block w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400 transition-all duration-200 resize-none @error('short_description') border-red-500 ring-red-200 @enderror"
                    placeholder="A brief description of your project">{{ old('short_description') }}</textarea>
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
                    placeholder="Detailed description of your project (optional)">{{ old('description') }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Detailed description of your project (optional)</p>
                @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Project URL -->
            <div class="mb-6">
                <label for="url" class="block text-sm font-semibold text-gray-900 mb-1">Project URL</label>
                <input type="text" name="url" id="url" value="{{ old('url') }}"
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
                    Create Project
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
    const preview = document.getElementById('image-preview');
    const errorMsg = document.getElementById('image-preview-error');
    const countDisplay = document.getElementById('selected-count');

    function updateCounter(count) {
        countDisplay.textContent = count;
        if (count !== 5) {
            countDisplay.parentElement.classList.add('text-red-600');
            countDisplay.parentElement.classList.remove('text-green-600');
        } else {
            countDisplay.parentElement.classList.add('text-green-600');
            countDisplay.parentElement.classList.remove('text-red-600');
        }
    }

    input.addEventListener('change', function () {
        preview.innerHTML = '';
        errorMsg.classList.add('hidden');
        const files = Array.from(input.files || []);
        
        updateCounter(files.length);
        
        if (files.length !== 5) {
            errorMsg.classList.remove('hidden');
        }
        
        // Store files in a temp array for removal
        let tempFiles = files.slice();
        tempFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative flex-none border rounded-lg p-2 bg-gray-50';
                wrapper.style.width = '6rem';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-16 object-cover rounded';

                const label = document.createElement('div');
                label.className = 'text-xs text-center mt-1 text-gray-600';
                label.textContent = `Image ${index + 1}`;

                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.textContent = '×';
                removeBtn.title = 'Remove image';
                removeBtn.style.cssText = 'position:absolute;top:-8px;right:-8px;width:24px;height:24px;background-color:#ef4444;color:white;border-radius:50%;font-size:16px;font-weight:bold;border:2px solid white;display:flex;align-items:center;justify-content:center;cursor:pointer;z-index:9999;box-shadow:0 2px 4px rgba(0,0,0,0.2);';
                removeBtn.onmouseover = function() { removeBtn.style.backgroundColor = '#dc2626'; };
                removeBtn.onmouseout = function() { removeBtn.style.backgroundColor = '#ef4444'; };
                removeBtn.onclick = function() {
                    tempFiles.splice(index, 1);
                    // Rebuild input files and preview
                    const dataTransfer = new DataTransfer();
                    tempFiles.forEach(f => dataTransfer.items.add(f));
                    input.files = dataTransfer.files;
                    input.dispatchEvent(new Event('change'));
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                wrapper.appendChild(label);
                preview.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    });
});
</script>
@endpush