@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 text-center">
        <h1 class="display-1 fw-bold text-primary mb-4">404</h1>
        <h2 class="h3 mb-4">Page Not Found</h2>
        <p class="text-muted mb-5">Sorry, we couldn't find the page you're looking for.</p>
        <a href="{{ url('/') }}" class="btn btn-primary px-4">
            Back to Home
        </a>
    </div>
</div>
@endsection