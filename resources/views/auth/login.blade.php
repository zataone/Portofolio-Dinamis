@extends('layouts.app')

@section('content')
<section class="py-12 bg-white sm:py-16 lg:py-20">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-sm mx-auto">
            <div class="text-center">
                <img class="w-auto h-12 mx-auto" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/logo-symbol.svg" alt="" />
                <h1 class="mt-12 text-2xl font-bold text-gray-900">Login to {{ config('app.name') }}</h1>
                <p class="mt-4 text-sm font-medium text-gray-500">Welcome back! Please login to your account</p>
            </div>

            <!-- <div class="mt-12">
                <button
                    type="button"
                    class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold leading-5 text-gray-600 transition-all duration-200 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 hover:bg-gray-50 hover:text-gray-900"
                >
                    <img class="w-5 h-5 mr-2" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/previews/sign-in/1/google-logo.svg" alt="" />
                    Sign in with Google
                </button>
            </div>

            <div class="relative mt-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>

                <div class="relative flex justify-center">
                    <span class="px-2 text-sm text-gray-400 bg-white"> or </span>
                </div>
            </div> -->

            <form method="POST" action="{{ route('login') }}" class="mt-4">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="text-sm font-bold text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address" class="border block w-full px-4 py-3 placeholder-gray-500 rounded-lg sm:text-sm caret-indigo-600 {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-600 focus:border-indigo-600' }}" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-sm font-bold text-gray-900">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">Forgot Password?</a>
                            @endif
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password (min. 8 character)" class="border block w-full px-4 py-3 placeholder-gray-500 rounded-lg sm:text-sm caret-indigo-600 {{ $errors->has('password') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-600 focus:border-indigo-600' }}" />
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="relative flex items-center">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600" />
                        </div>

                        <div class="ml-3">
                            <label for="remember" class="text-sm font-medium text-gray-900">Remember Me</label>
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500"
                        >
                            Sign in
                        </button>
                    </div>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm font-medium text-gray-900">Don't have an account? <a href="{{ route('register') }}" class="font-bold hover:underline">Sign up now</a></p>
            </div>
        </div>
    </div>
</section>
@endsection