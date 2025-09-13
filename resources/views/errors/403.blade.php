@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 text-center">
        <h1 class="display-1 fw-bold text-primary mb-4">403</h1>
        <h2 class="h3 mb-4">Access Denied</h2>
        <p class="text-muted mb-5">Sorry, you don't have permission to access this page.</p>
        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary px-4">
                Go Back
            </a>
            <a href="{{ url('/') }}" class="btn btn-primary px-4">
                Home Page
            </a>
        </div>
    </div>
</div>
@endsection