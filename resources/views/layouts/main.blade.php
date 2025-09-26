<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Page')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="flex flex-col min-h-screen">
        @include('components.navbar')
        
        <!-- Mobile sidebar overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 xl:hidden" style="display: none;"></div>
        
        <div class="flex flex-1">
            @include('components.sidebar')
            
            <div class="flex flex-col flex-1 overflow-x-hidden">
                <main class="flex-1">
                    <div class="py-6">
                        @if(isset($header))
                            <div class="px-4 mx-auto sm:px-6 md:px-8">
                                <h1 class="text-2xl font-semibold text-gray-900">{{ $header }}</h1>
                            </div>
                        @endif
                        
                        <div class="px-4 mx-auto mt-8 sm:px-6 md:px-8">
                            @yield('content')
                        </div>
                    </div>
                </main>
                
                @include('components.footer')
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
        // Toggle sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (sidebarToggle && sidebar && overlay) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                    if (window.innerWidth < 1280) {
                        if (sidebar.classList.contains('-translate-x-full')) {
                            overlay.style.display = 'none';
                        } else {
                            overlay.style.display = 'block';
                        }
                    }
                });
                
                // Close sidebar when clicking overlay
                overlay.addEventListener('click', function() {
                    sidebar.classList.add('-translate-x-full');
                    overlay.style.display = 'none';
                });
                
                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 1280) {
                        overlay.style.display = 'none';
                        sidebar.classList.remove('-translate-x-full');
                    } else {
                        sidebar.classList.add('-translate-x-full');
                    }
                });
                
                // Initialize sidebar state based on screen size
                if (window.innerWidth < 1280) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>