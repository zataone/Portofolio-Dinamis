@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark mb-1" style="font-size: 2rem;">Welcome Back! 👋</h2>
            <p class="text-muted" style="font-size: 1.1rem;">Please login to your account</p>
        </div>
        <div class="card" style="overflow: hidden;">
            <div class="card-body p-4 p-lg-5" style="position: relative;">
                <div class="position-absolute top-0 start-0 w-100 h-2" style="background: linear-gradient(90deg, #4f46e5, #6366f1);"></div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password (min. 8 character)">
                        @error('password')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">
                            Sign in
                        </button>
                    </div>
                    
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn d-flex align-items-center justify-content-center" style="border: 1px solid var(--border-color); border-radius: 8px; padding: 16px; color: var(--text-color); font-weight: 600; font-size: 15px;">
                            Create new account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection