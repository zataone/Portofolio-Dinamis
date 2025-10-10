@extends('layouts.main')

@section('title', 'User Profile')

@section('content')
<div class="space-y-5 sm:space-y-6">
    <!-- Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-bold text-gray-900">User Profile</h1>
            <p class="mt-1 text-sm text-gray-500">View and manage your personal information and portfolio details</p>
        </div>
    </div>

    <!-- Profile Information -->
    @if($userProfile)
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <div class="px-6 py-8">
            <div class="flex items-start space-x-6">
                <!-- Profile Photo -->
                <div class="flex-shrink-0">
                    @if($userProfile->photo)
                    <img src="{{ asset('storage/' . $userProfile->photo) }}" alt="{{ $userProfile->full_name }}" class="h-24 w-24 rounded-full object-cover border-4 border-white shadow-lg">
                    @else
                    <div class="h-24 w-24 bg-gray-200 rounded-full flex items-center justify-center border-4 border-white shadow-lg">
                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    @endif
                </div>

                <!-- Profile Details -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $userProfile->full_name }}</h2>
                            <p class="text-lg text-gray-600">Full Stack Developer</p>
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.user-profile.edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 bg-indigo-50 border border-indigo-200 rounded-lg hover:bg-indigo-100">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Bio</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $userProfile->bio ?? 'No bio provided' }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Email</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $userProfile->email ?? 'Not provided' }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Instagram</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $userProfile->instagram ?? 'Not provided' }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">TikTok</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $userProfile->tiktok ?? 'Not provided' }}</p>
                        </div>
                    </div>

                    <!-- Social Links -->
                    @if($userProfile->github || $userProfile->gitlab)
                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-500 mb-3">Development Links</h3>
                        <div class="flex space-x-4">
                            @if($userProfile->github)
                            <a href="{{ $userProfile->github }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                                <span class="sr-only">GitHub</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            @endif
                            @if($userProfile->gitlab)
                            <a href="{{ $userProfile->gitlab }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                                <span class="sr-only">GitLab</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.955 13.587l-1.342-4.135-2.664-8.189c-.135-.423-.73-.423-.867 0L16.418 9.45H7.582L4.919 1.263c-.135-.423-.73-.423-.867 0L1.388 9.452-.954 13.587a.905.905 0 00.329 1.013L12 21.621l10.625-7.021a.905.905 0 00.33-1.013z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="mt-6 text-sm text-gray-500">
                        Last updated: {{ $userProfile->updated_at->format('M d, Y \a\t g:i A') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- No Profile State -->
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Profile not found</h3>
            <p class="mt-1 text-sm text-gray-500">Please contact administrator to set up your profile.</p>
        </div>
    </div>
    @endif
</div>
@endsection