@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-5 sm:space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Today's Sale</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">$12,426</p>

                    <span class="inline-flex items-center text-sm font-semibold text-green-500">
                        + 36%
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Sales</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">$2,38,485</p>

                    <span class="inline-flex items-center text-sm font-semibold text-red-500">
                        - 14%
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 13l-5 5m0 0l-5-5m5 5V6" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Orders</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">84,382</p>

                    <span class="inline-flex items-center text-sm font-semibold text-green-500">
                        + 36%
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl">
            <div class="px-5 py-4">
                <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Customers</p>
                <div class="flex items-center justify-between mt-3">
                    <p class="text-xl font-bold text-gray-900">33,493</p>

                    <span class="inline-flex items-center text-sm font-semibold text-green-500">
                        + 36%
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 gap-5 sm:gap-6 lg:grid-cols-6">
        <div class="overflow-hidden bg-white border border-gray-200 rounded-xl lg:col-span-4">
            <div class="px-4 pt-5 sm:px-6">
                <div class="flex flex-wrap items-center justify-between">
                    <p class="text-base font-bold text-gray-900 lg:order-1">Sales Report</p>

                    <button
                        type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm lg:order-2 2xl:order-3 md:order-last hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                    >
                        <svg class="w-4 h-4 mr-1 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Export to CSV
                    </button>

                    <nav class="flex items-center justify-center mt-4 space-x-1 2xl:order-2 lg:order-3 md:mt-0 lg:mt-4 sm:space-x-2 2xl:mt-0">
                        <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-900 transition-all border border-gray-900 rounded-lg sm:px-4 hover:bg-gray-100 duration-200"> 12 Months </a>

                        <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-500 transition-all border border-transparent rounded-lg sm:px-4 hover:bg-gray-100 duration-200"> 6 Months </a>

                        <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-500 transition-all border border-transparent rounded-lg sm:px-4 hover:bg-gray-100 duration-200"> 30 Days </a>

                        <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-500 transition-all border border-transparent rounded-lg sm:px-4 hover:bg-gray-100 duration-200"> 7 Days </a>
                    </nav>
                </div>

                <div id="salesChart" class="h-64 mt-4"></div>
            </div>
        </div>

        <div class="overflow-hidden bg-white border border-gray-200 rounded-xl lg:col-span-2">
            <div class="px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <p class="text-base font-bold text-gray-900">Traffic Sources</p>

                    <div class="mt-4 sm:mt-0">
                        <div>
                            <label for="" class="sr-only"> Duration </label>
                            <select name="" id="" class="block w-full py-0 pl-0 pr-10 text-base border-none rounded-lg focus:outline-none focus:ring-0 sm:text-sm">
                                <option>Last 7 days</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-8 space-y-6">
                    <div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Direct</p>
                            <p class="text-sm font-medium text-gray-900">1,43,382</p>
                        </div>
                        <div class="mt-2 bg-gray-200 h-1.5 rounded-full relative">
                            <div class="absolute inset-y-0 left-0 bg-indigo-600 rounded-full w-[60%]"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Referral</p>
                            <p class="text-sm font-medium text-gray-900">87,974</p>
                        </div>
                        <div class="mt-2 bg-gray-200 h-1.5 rounded-full relative">
                            <div class="absolute inset-y-0 left-0 bg-indigo-600 rounded-full w-[50%]"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Social Media</p>
                            <p class="text-sm font-medium text-gray-900">45,211</p>
                        </div>
                        <div class="mt-2 bg-gray-200 h-1.5 rounded-full relative">
                            <div class="absolute inset-y-0 left-0 bg-indigo-600 rounded-full w-[30%]"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Twitter</p>
                            <p class="text-sm font-medium text-gray-900">21,893</p>
                        </div>
                        <div class="mt-2 bg-gray-200 h-1.5 rounded-full relative">
                            <div class="absolute inset-y-0 left-0 bg-indigo-600 rounded-full w-[15%]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transactions Section -->
    <div class="overflow-hidden bg-white border border-gray-200 rounded-xl">
        <div class="px-4 py-5 sm:p-6">
            <div class="sm:flex sm:items-start sm:justify-between">
                <div>
                    <p class="text-base font-bold text-gray-900">Transactions</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Recent transactions summary</p>
                </div>

                <div class="mt-4 sm:mt-0">
                    <a href="#" title="" class="inline-flex items-center text-xs font-semibold tracking-widest text-gray-500 uppercase hover:text-gray-900">
                        See all Transactions
                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="divide-y divide-gray-200">
            <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-6">
                <div class="col-span-2 px-4 lg:py-4 sm:px-6 lg:col-span-1">
                    <span class="text-xs font-medium text-green-900 bg-green-100 rounded-full inline-flex items-center px-2.5 py-1">
                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3"></circle>
                        </svg>
                        Completed
                    </span>
                </div>

                <div class="px-4 text-right lg:py-4 sm:px-6 lg:order-last">
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 transition-all duration-200 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>

                <div class="px-4 lg:py-4 sm:px-6 lg:col-span-2">
                    <p class="text-sm font-bold text-gray-900">Visa card **** 4831</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Card payment</p>
                </div>

                <div class="px-4 lg:py-4 sm:px-6">
                    <p class="text-sm font-bold text-gray-900">$182.94</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Jan 17, 2022</p>
                </div>

                <div class="px-4 lg:py-4 sm:px-6">
                    <p class="mt-1 text-sm font-medium text-gray-500">Amazon</p>
                </div>
            </div>

            <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-6">
                <div class="col-span-2 px-4 lg:py-4 sm:px-6 lg:col-span-1">
                    <span class="text-xs font-medium text-green-900 bg-green-100 rounded-full inline-flex items-center px-2.5 py-1">
                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3"></circle>
                        </svg>
                        Completed
                    </span>
                </div>

                <div class="px-4 text-right lg:py-4 sm:px-6 lg:order-last">
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 transition-all duration-200 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>

                <div class="px-4 lg:py-4 sm:px-6 lg:col-span-2">
                    <p class="text-sm font-bold text-gray-900">Mastercard **** 6442</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Card payment</p>
                </div>

                <div class="px-4 lg:py-4 sm:px-6">
                    <p class="text-sm font-bold text-gray-900">$99.00</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Jan 17, 2022</p>
                </div>

                <div class="px-4 lg:py-4 sm:px-6">
                    <p class="mt-1 text-sm font-medium text-gray-500">Facebook</p>
                </div>
            </div>

            <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-6">
                <div class="col-span-2 px-4 lg:py-4 sm:px-6 lg:col-span-1">
                    <span class="text-xs font-medium text-yellow-900 bg-yellow-100 rounded-full inline-flex items-center px-2.5 py-1">
                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3"></circle>
                        </svg>
                        Pending
                    </span>
                </div>

                <div class="px-4 text-right lg:py-4 sm:px-6 lg:order-last">
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 transition-all duration-200 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                        </svg>
                    </button>
                </div>

                <div class="px-4 lg:py-4 sm:px-6 lg:col-span-2">
                    <p class="text-sm font-bold text-gray-900">Account ****882</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Bank payment</p>
                </div>

                <div class="px-4 lg:py-4 sm:px-6">
                    <p class="text-sm font-bold text-gray-900">$249.94</p>
                    <p class="mt-1 text-sm font-medium text-gray-500">Jan 17, 2022</p>
                </div>

                <div class="px-4 lg:py-4 sm:px-6">
                    <p class="mt-1 text-sm font-medium text-gray-500">Netflix</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Setup Sales Chart
        var salesChartOptions = {
            chart: {
                type: 'area',
                height: 260,
                toolbar: {
                    show: false,
                },
                zoom: {
                    enabled: false,
                },
            },
            series: [
                {
                    name: 'New user',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 76, 85, 101],
                },
                {
                    name: 'Returning user',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 44, 55, 57],
                },
            ],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
            },
            grid: {
                row: {
                    opacity: 0,
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            yaxis: {
                show: false,
            },
            fill: {
                type: 'solid',
                opacity: [0.05, 0],
            },
            colors: ['#4F46E5', '#818CF8'],
            legend: {
                position: 'bottom',
                markers: {
                    radius: 12,
                    offsetX: -4,
                },
                itemMargin: {
                    horizontal: 12,
                    vertical: 20,
                },
            },
        }

        var salesChart = new ApexCharts(document.querySelector('#salesChart'), salesChartOptions);
        salesChart.render();
    });
</script>
@endpush