@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5">
        <div class="mb-4">
            <h2 class="fw-bold text-dark mb-2" style="font-size: 32px;">Create Account</h2>
            <p class="text-muted mb-0" style="font-size: 15px;">Join our community today</p>
        </div>
        <div class="card" style="overflow: hidden;">
            <div class="card-body p-4 p-lg-5" style="position: relative;">
                <div class="position-absolute top-0 start-0 w-100 h-2" style="background: linear-gradient(90deg, #4f46e5, #6366f1);"></div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                        @error('name')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password (min. 8 character)">
                        @error('password')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">
                            Create account
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="btn d-flex align-items-center justify-content-center" style="border: 1px solid var(--border-color); border-radius: 8px; padding: 16px; color: var(--text-color); font-weight: 600; font-size: 15px;">
                            Already have an account? Sign in
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection