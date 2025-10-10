<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ToolController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\UserProfileController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;

Route::get('/', function () {
    return view('landingpage.index');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    // Register Routes
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Password Reset Routes
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    // Dashboard Route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('projects', ProjectController::class);
        Route::resource('skills', SkillController::class);
        Route::resource('tools', ToolController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('project-categories', ProjectCategoryController::class);
        
        // User Profile (read and update only)
        Route::get('user-profile', [UserProfileController::class, 'index'])->name('user-profile.index');
        Route::get('user-profile/edit', [UserProfileController::class, 'edit'])->name('user-profile.edit');
        Route::put('user-profile', [UserProfileController::class, 'update'])->name('user-profile.update');
    });
    
    // Profile Routes
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Email Verification Routes
    Route::get('email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
    
    Route::get('email/verify/{id}/{hash}', function (Request $request) {
        $user = User::find($request->route('id'));

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended('dashboard')->with('status', 'Email already verified!');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->intended('dashboard')->with('status', 'Email verified successfully!');
    })->middleware(['signed'])->name('verification.verify');
    
    Route::post('email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
});
