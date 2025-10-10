<div class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200 transform -translate-x-full xl:translate-x-0 xl:static xl:inset-0 transition duration-200 ease-in-out" id="sidebar">
    <div class="flex flex-col h-full pt-5 overflow-y-auto">
        <div class="flex flex-col justify-between flex-1 h-full px-4">
            <div class="space-y-4">
                {{-- <div>
                    <button
                        type="button"
                        class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500"
                    >
                        <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Baru
                    </button>
                </div> --}}

                <nav class="flex-1 space-y-1">
                    <a href="{{ route('dashboard') }}" title="Dashboard" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </nav>



                <div>
                    <p class="px-4 text-xs font-semibold tracking-widest text-gray-400 uppercase">Content</p>
                    <nav class="flex-1 mt-4 space-y-1">
                        <a href="{{ route('admin.projects.index') }}" title="Projects" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.projects.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('admin.projects.*') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Projects
                        </a>

                        <a href="{{ route('admin.skills.index') }}" title="Skills & Tools" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.skills.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('admin.skills.*') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            Skills
                        </a>

                        <a href="{{ route('admin.tools.index') }}" title="Tools" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.tools.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('admin.tools.*') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Tools
                        </a>

                        <a href="{{ route('admin.brands.index') }}" title="Brands" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.brands.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('admin.brands.*') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Brands
                        </a>

                        <a href="{{ route('admin.testimonials.index') }}" title="Testimonials" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('admin.testimonials.*') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Testimonials
                        </a>
                    </nav>
                </div>

                <div>
                    <p class="px-4 text-xs font-semibold tracking-widest text-gray-400 uppercase">Management</p>
                    <nav class="flex-1 mt-4 space-y-1">
                        <a href="{{ route('admin.project-categories.index') }}" title="Project Categories" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.project-categories.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('admin.project-categories.*') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Categories
                        </a>

                        <a href="{{ route('admin.user-profile.index') }}" title="User Profile" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.user-profile.*') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-900 hover:bg-gray-200' }} rounded-lg group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 {{ request()->routeIs('admin.user-profile.*') ? 'text-indigo-600' : 'text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profile
                        </a>
                    </nav>
                </div>
            </div>

            {{-- <div class="pb-4 mt-12">
                <nav class="flex-1 space-y-1">
                    <a href="{{ route('profile.edit') }}" title="" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 rounded-lg hover:bg-gray-200 group">
                        <svg class="flex-shrink-0 w-5 h-5 mr-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                            />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Account Settings
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 rounded-lg hover:bg-gray-200 group">
                            <svg class="flex-shrink-0 w-5 h-5 mr-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </nav>
            </div> --}}
        </div>
    </div>
</div>