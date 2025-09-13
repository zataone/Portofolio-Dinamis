@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5">
        <div class="mb-4">
            <h2 class="fw-bold text-dark mb-2" style="font-size: 32px;">Forgot Password?</h2>
            <p class="text-muted mb-0" style="font-size: 15px;">Enter your email to reset your password</p>
        </div>
        <div class="card" style="overflow: hidden;">
            <div class="card-body p-4 p-lg-5" style="position: relative;">
                <div class="position-absolute top-0 start-0 w-100 h-2" style="background: linear-gradient(90deg, #4f46e5, #6366f1);"></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.708 2.825L15 11.105V5.383zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741zM1 11.105l4.708-2.897L1 5.383v5.722z"/>
                                </svg>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            {{ __('Send Reset Link') }}
                        </button>
                        
                        <p class="text-center mb-0">
                            Remember your password? 
                            <a href="{{ route('login') }}" class="btn btn-link p-0">Back to login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection