@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-900">Edit Profile</h1>
                <p class="text-gray-600 mt-1">Update your personal information</p>
            </div>
            <a href="{{ route('admin.user-profile.index') }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Profile
            </a>
        </div>

        <!-- Main Form -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-100">
            <form action="{{ route('admin.user-profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                
                <!-- Profile Photo Section -->
                <div class="flex items-center space-x-4 mb-6 pb-6 border-b border-gray-200">
                    <div class="flex-shrink-0">
                        @if($userProfile && $userProfile->photo)
                        <img src="{{ asset('storage/' . $userProfile->photo) }}" alt="{{ $userProfile->full_name ?? 'Profile' }}" 
                             class="h-16 w-16 rounded-full object-cover border-2 border-gray-200">
                        @else
                        <div class="h-16 w-16 bg-gray-200 rounded-full flex items-center justify-center border-2 border-gray-200">
                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-medium text-gray-900 mb-1">Profile Photo</h3>
                        <p class="text-sm text-gray-600 mb-3">Upload your profile picture (JPG, PNG, GIF - Max 2MB)</p>
                        <input type="file" name="photo" id="photo" accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('photo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Fields Grid -->
                <div class="space-y-6">
                    <!-- Full Name -->
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $userProfile->full_name ?? '') }}" required
                               class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('full_name') border-red-500 @enderror"
                               placeholder="Enter your full name">
                        @error('full_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bio -->
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                        <textarea name="bio" id="bio" rows="4" required
                                  class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none @error('bio') border-red-500 @enderror"
                                  placeholder="Tell people about yourself and your expertise">{{ old('bio', $userProfile->bio ?? '') }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">Brief description for your profile.</p>
                        @error('bio')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Social Media Links (Optional)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Instagram -->
                        <div>
                            <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                            <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $userProfile->instagram ?? '') }}" 
                                   placeholder="https://instagram.com/username"
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('instagram') border-red-500 @enderror">
                            @error('instagram')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- TikTok -->
                        <div>
                            <label for="tiktok" class="block text-sm font-medium text-gray-700 mb-2">TikTok</label>
                            <input type="url" name="tiktok" id="tiktok" value="{{ old('tiktok', $userProfile->tiktok ?? '') }}" 
                                   placeholder="https://tiktok.com/@username"
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('tiktok') border-red-500 @enderror">
                            @error('tiktok')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- GitHub -->
                        <div>
                            <label for="github" class="block text-sm font-medium text-gray-700 mb-2">GitHub</label>
                            <input type="url" name="github" id="github" value="{{ old('github', $userProfile->github ?? '') }}" 
                                   placeholder="https://github.com/username"
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('github') border-red-500 @enderror">
                            @error('github')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- GitLab -->
                        <div>
                            <label for="gitlab" class="block text-sm font-medium text-gray-700 mb-2">GitLab</label>
                            <input type="url" name="gitlab" id="gitlab" value="{{ old('gitlab', $userProfile->gitlab ?? '') }}" 
                                   placeholder="https://gitlab.com/username"
                                   class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('gitlab') border-red-500 @enderror">
                            @error('gitlab')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.user-profile.index') }}" 
                       class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-sm font-medium text-white hover:bg-blue-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection