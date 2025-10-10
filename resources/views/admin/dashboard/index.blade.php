@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5 sm:space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Projects</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">{{ $data['total_projects'] }}</p>
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Skills</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">{{ $data['total_skills'] }}</p>
                    <div class="p-2 bg-green-100 rounded-lg">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Tools</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">{{ $data['total_tools'] }}</p>
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Testimonials</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">{{ $data['total_testimonials'] }}</p>
                    <div class="p-2 bg-yellow-100 rounded-lg">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Categories -->
    <div class="grid grid-cols-1 gap-5 sm:gap-6 lg:grid-cols-6">
        <div class="overflow-hidden bg-white border border-gray-200 rounded-xl lg:col-span-4">
            <div class="px-4 pt-5 sm:px-6">
                <div class="flex flex-wrap items-center justify-between">
                    <p class="text-base font-bold text-gray-900">Recent Projects</p>
                    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                        View All Projects
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="mt-6 space-y-4">
                    @forelse($data['recent_projects'] as $project)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-4">
                            @if($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->project_name }}" class="w-12 h-12 rounded-lg object-cover">
                            @else
                            <div class="w-12 h-12 bg-gray-300 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            @endif
                            <div>
                                <p class="font-medium text-gray-900">{{ $project->project_name }}</p>
                                <p class="text-sm text-gray-500">{{ $project->category ? $project->category->name : 'No Category' }}</p>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500">{{ $project->created_at->diffForHumans() }}</span>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500">No projects found. <a href="{{ route('admin.projects.create') }}" class="text-indigo-600 hover:text-indigo-800">Create your first project</a></p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-xl lg:col-span-2">
            <div class="px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <p class="text-base font-bold text-gray-900">Categories</p>
                    <a href="{{ route('admin.project-categories.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">Manage</a>
                </div>

                <div class="mt-8 space-y-4">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total Categories</p>
                        <p class="text-sm font-medium text-gray-900">{{ $data['total_categories'] }}</p>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total Brands</p>
                        <p class="text-sm font-medium text-gray-900">{{ $data['total_brands'] }}</p>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-gray-200">
                    <p class="text-sm font-medium text-gray-900 mb-3">Quick Actions</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.projects.create') }}" class="flex items-center text-sm text-indigo-600 hover:text-indigo-800">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Project
                        </a>
                        <a href="{{ route('admin.skills.create') }}" class="flex items-center text-sm text-indigo-600 hover:text-indigo-800">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Skill
                        </a>
                        <a href="{{ route('admin.testimonials.create') }}" class="flex items-center text-sm text-indigo-600 hover:text-indigo-800">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Testimonial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Testimonials Section -->
    <div class="overflow-hidden bg-white border border-gray-200 rounded-xl">
        <div class="px-4 py-5 sm:p-6">
            <div class="sm:flex sm:items-start sm:justify-between">
                <div>
                    <p class="text-base font-bold text-gray-900">Recent Testimonials</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Latest testimonials from clients</p>
                </div>

                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center text-xs font-semibold tracking-widest text-gray-500 uppercase hover:text-gray-900">
                        See all Testimonials
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="divide-y divide-gray-200">
            @forelse($data['recent_testimonials'] as $testimonial)
            <div class="px-4 py-4 sm:px-6">
                <div class="flex items-start space-x-4">
                    @if($testimonial->photo)
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->brand_name }}" class="w-12 h-12 rounded-full object-cover">
                    @else
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    @endif
                    
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">{{ $testimonial->brand_name ?? 'Anonymous' }}</p>
                            <span class="text-xs text-gray-500">{{ $testimonial->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{ Str::limit($testimonial->message, 120) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="px-4 py-8 text-center">
                <div class="mx-auto w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <p class="text-gray-500">No testimonials yet. <a href="{{ route('admin.testimonials.create') }}" class="text-indigo-600 hover:text-indigo-800">Add your first testimonial</a></p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

