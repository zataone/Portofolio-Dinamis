@extends('layouts.app')

@section('content')
<section class="py-12 bg-white sm:py-16 lg:py-20">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-sm mx-auto">
            <div class="text-center">
                <img class="w-auto h-12 mx-auto" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/logo-symbol.svg" alt="" />
                <h1 class="mt-12 text-2xl font-bold text-gray-900">Reset Password</h1>
                <p class="mt-4 text-sm font-medium text-gray-500">Enter your email to receive reset link</p>
            </div>

            @if (session('status'))
                <div class="mt-8 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-sm text-green-600">{{ session('status') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-8">
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
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500"
                        >
                            Send Reset Link
                        </button>
                    </div>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm font-medium text-gray-900">Remember your password? <a href="{{ route('login') }}" class="font-bold hover:underline">Back to login</a></p>
            </div>
        </div>
    </div>
</section>
@endsection