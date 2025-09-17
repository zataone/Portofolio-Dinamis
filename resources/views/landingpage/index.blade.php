    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|plus-jakarta-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback for Tailwind CSS and Alpine.js -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            'pj': ['Plus Jakarta Sans', 'sans-serif'],
                            'inter': ['Inter', 'sans-serif'],
                        },
                        backgroundImage: {
                            'gradient-custom': 'linear-gradient(90deg, #44BCFF 0%, #FF44EC 50%, #FF675E 100%)',
                        }
                    }
                }
            }
        </script>
        <style>
            /* Ensure custom gradients work */
            .bg-gradient-custom {
                background: linear-gradient(90deg, #44BCFF, #FF44EC, #FF675E);
            }
            /* Credit card styles */
            .credit-card {
                background: linear-gradient(110deg, #2563eb, #4338ca);
                border-radius: 1rem;
                color: white;
                position: relative;
                width: 100%;
                max-width: 380px;
                height: 220px;
                transform: perspective(1000px) rotateY(0deg);
                transition: transform 0.6s;
            }
            .credit-card-gold {
                background: linear-gradient(110deg, #d97706, #b45309);
            }
            [x-cloak] { display: none !important; }
        </style>
    @endif
</head>
<body>
    <div class="relative bg-gray-50">
        <div class="absolute bottom-0 right-0 overflow-hidden lg:inset-y-0">
            <img class="w-auto h-full" src="https://d33wubrfki0l68.cloudfront.net/1e0fc04f38f5896d10ff66824a62e466839567f8/699b5/images/hero/3/background-pattern.png" alt="" />
        </div>

        <header class="relative py-4 md:py-6">
            <div class="container px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex-shrink-0">
                        <a href="#" title="" class="flex rounded outline-none focus:ring-1 focus:ring-gray-900 focus:ring-offset-2">
                            <img class="w-auto h-8" src="https://d33wubrfki0l68.cloudfront.net/682a555ec15382f2c6e7457ca1ef48d8dbb179ac/f8cd3/images/logo.svg" alt="" />
                        </a>
                    </div>

                    <div class="flex lg:hidden">
                        <button type="button" class="text-gray-900">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="hidden lg:flex lg:ml-10 xl:ml-16 lg:items-center lg:justify-center lg:space-x-8 xl:space-x-16">
                        <a href="#" title="" class="text-base font-medium text-gray-900 transition-all duration-200 rounded focus:outline-none font-pj hover:text-opacity-50 focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> Solutions </a>
                        <a href="#" title="" class="text-base font-medium text-gray-900 transition-all duration-200 rounded focus:outline-none font-pj hover:text-opacity-50 focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> Industries </a>
                        <a href="#" title="" class="text-base font-medium text-gray-900 transition-all duration-200 rounded focus:outline-none font-pj hover:text-opacity-50 focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> Fees </a>
                        <a href="#" title="" class="text-base font-medium text-gray-900 transition-all duration-200 rounded focus:outline-none font-pj hover:text-opacity-50 focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> About Rareblocks </a>
                    </div>

                    <div class="hidden lg:ml-auto lg:flex lg:items-center lg:space-x-8 xl:space-x-10">
                        <a href="#" title="" class="text-base font-medium text-gray-900 transition-all duration-200 rounded focus:outline-none font-pj hover:text-opacity-50 focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> Sign in </a>
                        <a href="#" title="" class="px-5 py-2 text-base font-bold leading-7 text-white transition-all duration-200 bg-gray-900 border border-transparent rounded-xl hover:bg-gray-600 font-pj focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900" role="button">
                            Create free account
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <section class="relative pt-12 sm:pt-16 lg:pt-20 lg:pb-2">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="grid max-w-lg grid-cols-1 mx-auto lg:max-w-full lg:items-center lg:grid-cols-2 gap-y-12 lg:gap-x-8">
                    <div>
                        <div class="text-center lg:text-left">
                            <h1 class="text-4xl font-bold leading-tight text-gray-900 sm:text-5xl sm:leading-tight lg:leading-tight lg:text-6xl font-pj">A special credit card made for Developers.</h1>
                            <p class="mt-2 text-lg text-gray-600 sm:mt-8 font-inter">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vehicula massa in enim luctus. Rutrum arcu.</p>

                            <form action="#" method="POST" class="mt-8 sm:mt-10">
                                <div class="relative p-2 sm:border sm:border-gray-400 group sm:rounded-xl sm:focus-within:ring-1 sm:focus-within:ring-gray-900 sm:focus-within:border-gray-900">
                                    <input
                                        type="email"
                                        name=""
                                        id=""
                                        placeholder="Enter email address"
                                        class="block w-full px-4 py-4 text-gray-900 placeholder-gray-900 bg-transparent border border-gray-400 outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 rounded-xl sm:border-none sm:focus:ring-0 sm:focus:border-transparent"
                                        required=""
                                    />
                                    <div class="mt-4 sm:mt-0 sm:absolute sm:inset-y-0 sm:right-0 sm:flex sm:items-center sm:pr-2">
                                        <button type="submit" class="inline-flex px-6 py-3 text-lg font-bold text-white transition-all duration-200 bg-gray-900 rounded-lg focus:outline-none focus:bg-gray-600 font-pj hover:bg-gray-600">Get Free Card</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="flex items-center justify-center mt-10 space-x-6 lg:justify-start sm:space-x-8">
                            <div class="flex items-center">
                                <p class="text-3xl font-medium text-gray-900 sm:text-4xl font-pj">2943</p>
                                <p class="ml-3 text-sm text-gray-900 font-pj">Cards<br />Delivered</p>
                            </div>

                            <div class="hidden sm:block">
                                <svg class="text-gray-400" width="16" height="39" viewBox="0 0 16 39" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="0.72265" y1="10.584" x2="15.7226" y2="0.583975"></line>
                                    <line x1="0.72265" y1="17.584" x2="15.7226" y2="7.58398"></line>
                                    <line x1="0.72265" y1="24.584" x2="15.7226" y2="14.584"></line>
                                    <line x1="0.72265" y1="31.584" x2="15.7226" y2="21.584"></line>
                                    <line x1="0.72265" y1="38.584" x2="15.7226" y2="28.584"></line>
                                </svg>
                            </div>

                            <div class="flex items-center">
                                <p class="text-3xl font-medium text-gray-900 sm:text-4xl font-pj">$1M+</p>
                                <p class="ml-3 text-sm text-gray-900 font-pj">Transaction<br />Completed</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <img class="w-full" src="https://d33wubrfki0l68.cloudfront.net/a78a55b3add0dc26d3587d02ecc23bebc28bf5f8/67091/images/hero/5.2/illustration.png" alt="" />
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="py-5 bg-gray-50">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="relative max-w-2xl mx-auto mt-12 overflow-hidden bg-blue-600 sm:mt-16 lg:max-w-3xl xl:max-w-none rounded-2xl">
                <div class="absolute top-0 left-0 -translate-x-2/3 -translate-y-[75%]">
                    <div class="border-[8px] border-white rounded-full w-80 h-80 opacity-20 lg:opacity-100"></div>
                </div>

                <div class="absolute bottom-0 right-0 translate-x-1/3 translate-y-[85%]">
                    <div class="border-[8px] border-white rounded-full w-80 h-80 opacity-20 lg:opacity-100"></div>
                </div>

                <div class="relative px-8 py-12 lg:px-12 lg:py-16 xl:py-20">
                    <div class="grid grid-cols-1 gap-8 mdfirst-letter:gap-12 xl:gap-8 sm:grid-cols-2 xl:grid-cols-4">
                        <div class="flex items-center">
                            <p class="w-24 text-5xl font-semibold tracking-tight text-white xl:w-auto shrink-0">483</p>
                            <h3 class="ml-5 text-base font-normal leading-tight text-blue-200">Satisfied global clients</h3>
                        </div>

                        <div class="flex items-center">
                            <p class="w-24 text-5xl font-semibold tracking-tight text-white xl:w-auto shrink-0">78%</p>
                            <h3 class="ml-5 text-base font-normal leading-tight text-blue-200">Download total range</h3>
                        </div>

                        <div class="flex items-center">
                            <p class="w-24 text-5xl font-semibold tracking-tight text-white xl:w-auto shrink-0">854</p>
                            <h3 class="ml-5 text-base font-normal leading-tight text-blue-200">Finish success projects</h3>
                        </div>

                        <div class="flex items-center">
                            <p class="w-24 text-5xl font-semibold tracking-tight text-white xl:w-auto shrink-0">315</p>
                            <h3 class="ml-5 text-base font-normal leading-tight text-blue-200">Branding awards winning</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white sm:py-16 lg:py-20 xl:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-y-12 lg:gap-x-16 xl:gap-x-24">
                <div class="grid gap-4 px-8 py-12 bg-gray-200 rounded-3xl place-items-center sm:px-16 sm:py-20">
                    <img class="w-full shadow-xl rounded-xl" src="https://landingfoliocom.imgix.net/store/collection/saasui/images/features/3/blue-card.svg" alt="" />
                    <img class="w-full shadow-xl rounded-xl" src="https://landingfoliocom.imgix.net/store/collection/saasui/images/features/3/white-card.svg" alt="" />
                </div>

                <div class="xl:pr-8">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <p class="ml-2 text-base font-semibold text-blue-600">Communicate easily</p>
                    </div>
                    <h2 class="mt-6 text-3xl font-semibold tracking-tight text-gray-900 lg:mt-8 sm:text-4xl lg:text-5xl">Connect with users with zero hassle.</h2>
                    <p class="mt-4 text-base font-normal leading-7 text-gray-600 lg:text-lg lg:pr-24 lg:mt-6 lg:leading-8">Clarity gives you the blocks & components you need to create a truly professional website, landing page or admin panel for your SaaS.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white sm:py-16 lg:py-20 xl:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="grid items-center grid-cols-1 lg:grid-cols-2 lg:gap-x-16 xl:gap-x-24 gap-y-12">
                <div class="grid overflow-hidden bg-blue-100 lg:order-2 rounded-3xl place-items-center">
                    <div class="p-6 sm:p-12">
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:px-8 sm:text-3xl">Get daily reports on email & stay updated always.</h2>
                        <img class="w-full mt-6 sm:mt-10" src="https://landingfoliocom.imgix.net/store/collection/saasui/images/features/10/chart.png" alt="" />
                    </div>
                </div>

                <div class="xl:pr-24 lg:order-1">
                    <ul class="space-y-10 sm:space-y-14">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                            </svg>
                            <p class="ml-3 text-xl font-normal text-gray-900"><span class="font-semibold">Cloud Storage:</span> Clarity gives you the blocks & components you need to create a website.</p>
                        </li>

                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                            <p class="ml-3 text-xl font-normal text-gray-900"><span class="font-semibold">Use Less RAM:</span> Clarity gives you the blocks & components you need to create a website.</p>
                        </li>

                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-blue-600 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <p class="ml-3 text-xl font-normal text-gray-900"><span class="font-semibold">Out of The Box Design:</span> Clarity gives you the blocks & components you need to create a website.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white sm:py-16 lg:py-20 xl:py-24">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-y-12 lg:gap-x-16 xl:gap-x-24">
                <div class="grid gap-4 px-8 py-12 bg-gray-200 rounded-3xl place-items-center sm:px-16 sm:py-20">
                    <img class="w-full shadow-xl rounded-xl" src="https://landingfoliocom.imgix.net/store/collection/saasui/images/features/3/blue-card.svg" alt="" />
                    <img class="w-full shadow-xl rounded-xl" src="https://landingfoliocom.imgix.net/store/collection/saasui/images/features/3/white-card.svg" alt="" />
                </div>

                <div class="xl:pr-8">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <p class="ml-2 text-base font-semibold text-blue-600">Communicate easily</p>
                    </div>
                    <h2 class="mt-6 text-3xl font-semibold tracking-tight text-gray-900 lg:mt-8 sm:text-4xl lg:text-5xl">Connect with users with zero hassle.</h2>
                    <p class="mt-4 text-base font-normal leading-7 text-gray-600 lg:text-lg lg:pr-24 lg:mt-6 lg:leading-8">Clarity gives you the blocks & components you need to create a truly professional website, landing page or admin panel for your SaaS.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white sm:py-16 lg:py-20">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="mx-auto text-center lg:text-left sm:max-w-md lg:mx-0">
                <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">Best for home office</h2>
                <p class="mt-4 text-base font-normal leading-7 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus faucibus massa dignissim tempus.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 px-4 mt-12 text-center xl:gap-3 sm:gap-x-4 sm:mt-16 md:gap-y-10 sm:grid-cols-2 md:grid-cols-3 gap-y-8 lg:grid-cols-5 xl:px-3">
            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-1.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$19.00-$29.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Beoplay M5 Bluetooth Speaker
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Audio & Sound</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-2.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$49.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Metal Laptop Table
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Furniture</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-3.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$29.00-$39.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Arion 30 Smart Light
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Accessories</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-4.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$85.99</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Minimal Office Desk
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Furniture</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-5.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$29.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Garidon 10 Stand
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Furniture</p>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white sm:py-16 lg:py-20">
        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="mx-auto text-center lg:text-left sm:max-w-md lg:mx-0">
                <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">Best for home office</h2>
                <p class="mt-4 text-base font-normal leading-7 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus faucibus massa dignissim tempus.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 px-4 mt-12 text-center xl:gap-3 sm:gap-x-4 sm:mt-16 md:gap-y-10 sm:grid-cols-2 md:grid-cols-3 gap-y-8 lg:grid-cols-5 xl:px-3">
            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-1.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$19.00-$29.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Beoplay M5 Bluetooth Speaker
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Audio & Sound</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-2.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$49.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Metal Laptop Table
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Furniture</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-3.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$29.00-$39.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Arion 30 Smart Light
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Accessories</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-4.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$85.99</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Minimal Office Desk
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Furniture</p>
            </div>

            <div class="relative group">
                <div class="relative">
                    <div class="overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover w-full h-full transition-all duration-300 origin-bottom group-hover:scale-110" src="https://cdn.rareblocks.xyz/collection/clarity-ecommerce/images/item-cards/6/product-5.png" alt="" />
                    </div>
                    <div class="absolute inset-x-0 bottom-6">
                        <p class="bg-white rounded-full border border-gray-200 px-4 text-sm font-bold text-gray-900 py-1.5 inline-flex items-center justify-center">$29.00</p>
                    </div>
                </div>
                <h3 class="mt-4 text-base font-bold text-gray-900">
                    <a href="#" title="">
                        Garidon 10 Stand
                        <span class="absolute inset-0" aria-hidden="true"></span>
                    </a>
                </h3>
                <p class="mt-1.5 text-base font-medium text-gray-500">Furniture</p>
            </div>
        </div>
    </section>

    <section class="relative py-12 bg-white sm:py-16 lg:py-20">
        <div class="absolute inset-0">
            <img class="object-cover w-full h-full" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/5/grid-pattern.png" alt="" />
        </div>

        <div class="relative px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="max-w-xl mx-auto text-center">
                <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl lg:text-5xl">Helping developers to get their dream job</h1>
                <p class="max-w-md mx-auto mt-6 text-base font-normal leading-7 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vehicula massa in enim luctus. Rutrum arcu.</p>

                <form action="#" method="POST" class="max-w-md mx-auto mt-8 space-y-4 sm:space-x-4 sm:flex sm:space-y-0 sm:items-end">
                    <div class="flex-1">
                        <label for="" class="sr-only"> Email address </label>
                        <div>
                            <input 
                                type="email" 
                                name="" 
                                id="" 
                                class="block w-full px-4 py-3 sm:py-3.5 text-base font-medium text-gray-900 placeholder-gray-500 border border-gray-300 rounded-lg sm:text-sm focus:ring-gray-900 focus:border-gray-900" 
                                placeholder="Email address" 
                            />
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="absolute transitiona-all duration-1000 opacity-70 inset-0 bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg filter group-hover:opacity-100 group-hover:duration-200"></div>

                        <button
                            type="button"
                            class="inline-flex relative items-center justify-center w-full sm:w-auto px-8 py-3 sm:text-sm text-base sm:py-3.5 font-semibold text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600"
                        >
                            Join Now
                        </button>
                    </div>
                </form>

                <ul class="flex items-center justify-center mt-6 space-x-6 sm:space-x-8">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-xs font-medium text-gray-900 sm:text-sm"> Weekly new articles </span>
                    </li>

                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-xs font-medium text-gray-900 sm:text-sm"> Join other 1600+ Devs </span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex w-full gap-6 pb-8 mt-12 overflow-x-auto sm:mt-16 lg:mt-20 snap-x">
            <div class="relative snap-center scroll-ml-6 shrink-0 first:pl-6 last:pr-6">
                <div class="overflow-hidden w-[300px] lg:w-[420px] transition-all duration-200 transform bg-white border border-gray-200 rounded-2xl hover:shadow-lg hover:-translate-y-1">
                    <div class="px-4 py-5 sm:p-5">
                        <div class="flex items-start lg:items-center">
                            <a href="#" title="" class="shrink-0">
                                <img class="lg:h-24 w-14 h-14 lg:w-24 rounded-xl object-cvoer" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/5/thumbnail-1.png" alt="" />
                            </a>

                            <div class="flex-1 ml-4 lg:ml-6">
                                <p class="text-xs font-medium text-gray-900 lg:text-sm">
                                    <a href="#" title="" class=""> Growth </a>
                                </p>
                                <p class="mt-2 text-sm font-bold text-gray-900 lg:text-lg group-hover:text-gray-600">
                                    <a href="#" title="" class=""> How a visual artist redefines success in graphic design </a>
                                </p>
                                <p class="mt-2 text-xs font-medium text-gray-500 lg:text-sm">April 09, 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative snap-center scroll-ml-6 shrink-0 first:pl-6 last:pr-6">
                <div class="overflow-hidden w-[300px] lg:w-[420px] transition-all duration-200 transform bg-white border border-gray-200 rounded-2xl hover:shadow-lg hover:-translate-y-1">
                    <div class="px-4 py-5 sm:p-5">
                        <div class="flex items-start lg:items-center">
                            <a href="#" title="" class="shrink-0">
                                <img class="lg:h-24 w-14 h-14 lg:w-24 rounded-xl object-cvoer" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/5/thumbnail-2.png" alt="" />
                            </a>

                            <div class="flex-1 ml-4 lg:ml-6">
                                <p class="text-xs font-medium text-gray-900 lg:text-sm">
                                    <a href="#" title="" class=""> Growth </a>
                                </p>
                                <p class="mt-2 text-sm font-bold text-gray-900 lg:text-lg group-hover:text-gray-600">
                                    <a href="#" title="" class=""> How a visual artist redefines success in graphic design </a>
                                </p>
                                <p class="mt-2 text-xs font-medium text-gray-500 lg:text-sm">April 09, 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative snap-center scroll-ml-6 shrink-0 first:pl-6 last:pr-6">
                <div class="overflow-hidden w-[300px] lg:w-[420px] transition-all duration-200 transform bg-white border border-gray-200 rounded-2xl hover:shadow-lg hover:-translate-y-1">
                    <div class="px-4 py-5 sm:p-5">
                        <div class="flex items-start lg:items-center">
                            <a href="#" title="" class="shrink-0">
                                <img class="lg:h-24 w-14 h-14 lg:w-24 rounded-xl object-cvoer" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/5/thumbnail-3.png" alt="" />
                            </a>

                            <div class="flex-1 ml-4 lg:ml-6">
                                <p class="text-xs font-medium text-gray-900 lg:text-sm">
                                    <a href="#" title="" class=""> Growth </a>
                                </p>
                                <p class="mt-2 text-sm font-bold text-gray-900 lg:text-lg group-hover:text-gray-600">
                                    <a href="#" title="" class=""> How a visual artist redefines success in graphic design </a>
                                </p>
                                <p class="mt-2 text-xs font-medium text-gray-500 lg:text-sm">April 09, 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative snap-center scroll-ml-6 shrink-0 first:pl-6 last:pr-6">
                <div class="overflow-hidden w-[300px] lg:w-[420px] transition-all duration-200 transform bg-white border border-gray-200 rounded-2xl hover:shadow-lg hover:-translate-y-1">
                    <div class="px-4 py-5 sm:p-5">
                        <div class="flex items-start lg:items-center">
                            <a href="#" title="" class="shrink-0">
                                <img class="lg:h-24 w-14 h-14 lg:w-24 rounded-xl object-cvoer" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/5/thumbnail-4.png" alt="" />
                            </a>

                            <div class="flex-1 ml-4 lg:ml-6">
                                <p class="text-xs font-medium text-gray-900 lg:text-sm">
                                    <a href="#" title="" class=""> Growth </a>
                                </p>
                                <p class="mt-2 text-sm font-bold text-gray-900 lg:text-lg group-hover:text-gray-600">
                                    <a href="#" title="" class=""> How a visual artist redefines success in graphic design </a>
                                </p>
                                <p class="mt-2 text-xs font-medium text-gray-500 lg:text-sm">April 09, 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative snap-center scroll-ml-6 shrink-0 first:pl-6 last:pr-6">
                <div class="overflow-hidden w-[300px] lg:w-[420px] transition-all duration-200 transform bg-white border border-gray-200 rounded-2xl hover:shadow-lg hover:-translate-y-1">
                    <div class="px-4 py-5 sm:p-5">
                        <div class="flex items-start lg:items-center">
                            <a href="#" title="" class="shrink-0">
                                <img class="lg:h-24 w-14 h-14 lg:w-24 rounded-xl object-cvoer" src="https://landingfoliocom.imgix.net/store/collection/clarity-blog/images/hero/5/thumbnail-5.png" alt="" />
                            </a>

                            <div class="flex-1 ml-4 lg:ml-6">
                                <p class="text-xs font-medium text-gray-900 lg:text-sm">
                                    <a href="#" title="" class=""> Growth </a>
                                </p>
                                <p class="mt-2 text-sm font-bold text-gray-900 lg:text-lg group-hover:text-gray-600">
                                    <a href="#" title="" class=""> How a visual artist redefines success in graphic design </a>
                                </p>
                                <p class="mt-2 text-xs font-medium text-gray-500 lg:text-sm">April 09, 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white sm:py-16 lg:py-20">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="xl:flex xl:items-center xl:justify-between">
                <h2 class="text-xl font-bold text-center text-gray-400 xl:text-left font-pj">1000+ Big brands trust us</h2>

                <div class="grid items-center grid-cols-1 mt-10 gap-y-6 xl:mt-0 sm:grid-cols-2 sm:gap-y-8 lg:grid-cols-4 lg:gap-x-8">
                    <img class="object-contain w-auto mx-auto h-9" src="https://cdn.rareblocks.xyz/collection/clarity/images/brands/1/logo-vertex.svg" alt="" />
                    <img class="object-contain w-auto mx-auto h-9" src="https://cdn.rareblocks.xyz/collection/clarity/images/brands/1/logo-squarestone.svg" alt="" />
                    <img class="object-contain w-auto mx-auto h-9" src="https://cdn.rareblocks.xyz/collection/clarity/images/brands/1/logo-martino.svg" alt="" />
                    <img class="object-contain w-auto mx-auto h-9" src="https://cdn.rareblocks.xyz/collection/clarity/images/brands/1/logo-waverio.svg" alt="" />
                </div>
            </div>
        </div>
    </section>


    <footer class="py-12 bg-white sm:py-16 lg:py-20">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <img class="w-auto h-8 mx-auto" src="https://cdn.rareblocks.xyz/collection/clarity/images/logo.svg" alt="" />

            <ul class="flex flex-wrap items-center justify-center space-x-12 md:space-x-16 mt-14">
                <li>
                    <a href="#" title="" class="inline-flex text-lg font-medium text-gray-900 transition-all duration-200 transform font-pj hover:-translate-y-1 hover:text-gray-600"> About </a>
                </li>

                <li>
                    <a href="#" title="" class="inline-flex text-lg font-medium text-gray-900 transition-all duration-200 transform font-pj hover:-translate-y-1 hover:text-gray-600"> Features </a>
                </li>

                <li>
                    <a href="#" title="" class="inline-flex text-lg font-medium text-gray-900 transition-all duration-200 transform font-pj hover:-translate-y-1 hover:text-gray-600"> Works </a>
                </li>

                <li>
                    <a href="#" title="" class="inline-flex mt-8 -ml-12 text-lg font-medium text-gray-900 transition-all duration-200 transform font-pj hover:-translate-y-1 hover:text-gray-600 sm:ml-0 sm:mt-0"> Support </a>
                </li>

                <li>
                    <a href="#" title="" class="inline-flex mt-8 text-lg font-medium text-gray-900 transition-all duration-200 transform font-pj hover:-translate-y-1 hover:text-gray-600 sm:mt-0"> Help </a>
                </li>
            </ul>

            <div class="mt-12">
                <svg class="w-auto h-4 mx-auto text-gray-300" viewBox="0 0 172 16" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 11 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 46 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 81 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 116 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 151 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 18 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 53 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 88 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 123 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 158 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 25 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 60 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 95 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 130 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 165 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 32 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 67 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 102 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 137 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 172 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 39 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 74 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 109 1)" />
                    <line y1="-0.5" x2="18.0278" y2="-0.5" transform="matrix(-0.5547 0.83205 0.83205 0.5547 144 1)" />
                </svg>
            </div>

            <ul class="flex items-center justify-center mt-12 space-x-3">
                <li>
                    <a href="#" target="_blank" title="" class="inline-flex items-center justify-center w-10 h-10 text-gray-900 transition-all duration-200 rounded-full hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-gray-200" rel="noopener">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"
                            ></path>
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="#" target="_blank" title="" class="inline-flex items-center justify-center w-10 h-10 text-gray-900 transition-all duration-200 rounded-full hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-gray-200" rel="noopener">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z"></path>
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="#" target="_blank" title="" class="inline-flex items-center justify-center w-10 h-10 text-gray-900 transition-all duration-200 rounded-full hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-gray-200" rel="noopener">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                            <circle cx="16.806" cy="7.207" r="1.078"></circle>
                            <path
                                d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"
                            ></path>
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="#" target="_blank" title="" class="inline-flex items-center justify-center w-10 h-10 text-gray-900 transition-all duration-200 rounded-full hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-gray-200" rel="noopener">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"
                            ></path>
                        </svg>
                    </a>
                </li>
            </ul>

            <p class="text-base font-normal text-center text-gray-600 mt-7 font-pj">© Copyright 2021, All Rights Reserved</p>
        </div>
    </footer>


    </body>
</html>