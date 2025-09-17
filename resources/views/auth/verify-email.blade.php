@extends('layouts.app')

@section('content')
<section class="py-12 bg-white sm:py-16 lg:py-20">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-sm mx-auto">
            <div class="text-center">
                <img class="w-auto h-12 mx-auto" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/logo-symbol.svg" alt="" />
                <h1 class="mt-12 text-2xl font-bold text-gray-900">Verify Your Email</h1>
                <p class="mt-4 text-sm font-medium text-gray-500">Check your inbox for verification link</p>
            </div>

            @if (session('resent'))
                <div class="mt-8 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-sm text-green-600">Link verifikasi baru telah dikirim ke email Anda.</p>
                </div>
            @endif

            <div class="mt-8 p-6 bg-gray-50 border border-gray-200 rounded-lg">
                <div class="text-center">
                    <svg class="w-12 h-12 mx-auto text-indigo-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-sm text-gray-600 mb-4">
                        Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.
                    </p>
                    <p class="text-sm text-gray-600 mb-6">
                        Jika Anda tidak menerima email, Anda dapat meminta yang baru di bawah ini.
                    </p>
                    
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500"
                        >
                            Resend Verification Email
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-6 text-center">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:underline">
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection