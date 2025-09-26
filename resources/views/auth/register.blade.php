@extends('layouts.app')

@section('content')
<section class="py-12 bg-white sm:py-16 lg:py-20">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-sm mx-auto">
            <div class="text-center">
                <img class="w-auto h-12 mx-auto" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/logo-symbol.svg" alt="" />
                <h1 class="mt-12 text-3xl font-bold text-gray-900">Create Account</h1>
                <p class="mt-4 text-sm font-medium text-gray-500">Join our community today</p>
            </div>

            <!-- <div class="mt-12">
                <button
                    type="button"
                    class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold leading-5 text-gray-600 transition-all duration-200 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 hover:bg-gray-50 hover:text-gray-900"
                >
                    <img class="w-5 h-5 mr-2" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/previews/sign-in/1/google-logo.svg" alt="" />
                    Sign up with Google  
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

            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="text-sm font-bold text-gray-900">Name</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name" class="border block w-full px-4 py-3 placeholder-gray-500 rounded-lg sm:text-sm caret-indigo-600 {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-600 focus:border-indigo-600' }}" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email" class="text-sm font-bold text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address" class="border block w-full px-4 py-3 placeholder-gray-500 rounded-lg sm:text-sm caret-indigo-600 {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-600 focus:border-indigo-600' }}" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password" class="text-sm font-bold text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password (min. 8 character)" class="border block w-full px-4 py-3 placeholder-gray-500 rounded-lg sm:text-sm caret-indigo-600 {{ $errors->has('password') ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-600 focus:border-indigo-600' }}" />
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="text-sm font-bold text-gray-900">Confirm Password</label>
                        <div class="mt-2">
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm caret-indigo-600" />
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500"
                        >
                            Create account
                        </button>
                    </div>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm font-medium text-gray-900">Already have an account? <a href="{{ route('login') }}" class="font-bold hover:underline">Sign in</a></p>
            </div>
        </div>
    </div>
</section>
@endsection