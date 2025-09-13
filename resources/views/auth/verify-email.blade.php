@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark mb-1" style="font-size: 2rem;">Verify Your Email ✉️</h2>
            <p class="text-muted" style="font-size: 1.1rem;">Check your inbox for verification link</p>
        </div>
        <div class="card" style="overflow: hidden;">
            <div class="card-body p-4 p-lg-5" style="position: relative;">
                <div class="position-absolute top-0 start-0 w-100 h-2" style="background: linear-gradient(90deg, #4f46e5, #6366f1);"></div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            {{ __('click here to request another') }}
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection