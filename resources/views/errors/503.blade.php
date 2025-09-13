@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 text-center">
        <h1 class="display-1 fw-bold text-primary mb-4">503</h1>
        <h2 class="h3 mb-4">Service Unavailable</h2>
        <p class="text-muted mb-5">We're currently performing maintenance. Please check back soon.</p>
        <div class="refresh-button">
            <button onclick="window.location.reload()" class="btn btn-primary px-4">
                Refresh Page
            </button>
        </div>
    </div>
</div>
@endsection