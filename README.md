# Sistem Autentikasi Laravel Lengkap

## Fitur yang Tersedia

-   Login
-   Register
-   Lupa Password / Reset Password
-   Verifikasi Email
-   Remember Me
-   Role dan Permission Management
-   Session Management
-   Profile Management

## Instalasi Package yang Dibutuhkan

```bash / terminal
composer require spatie/laravel-permission
```

## 1. Konfigurasi Database dan Email

```env
# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

# Email (Mailtrap)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## 2. Model dan Migration

### User Model

```php
// filepath: app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
```

## 3. Controllers

### Login Controller

```php
// filepath: app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Simpan info login terakhir di session
            $request->session()->put('last_login_at', now());
            $request->session()->put('last_login_ip', $request->ip());
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak valid.',
        ]);
    }
}
```

## 7. Custom Error Pages

Untuk menampilkan halaman error yang lebih baik, buat folder `resources/views/errors` dan tambahkan file berikut:

-   `404.blade.php` — Not Found
-   `419.blade.php` — Page Expired
-   `403.blade.php` — Forbidden
-   `500.blade.php` — Server Error
-   `503.blade.php` — Maintenance Mode

Contoh isi file `404.blade.php`:

```php
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
```

Laravel akan otomatis menggunakan file-file ini jika terjadi error terkait.

### Reset Password Controller

```php
// filepath: app/Http/Controllers/Auth/ForgotPasswordController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
```

### Profile Controller

```php
// filepath: app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'current_password' => 'required_with:password|current_password',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if (isset($validated['password'])) {
            $user->update([
                'password' => Hash::make($validated['password'])
            ]);
        }

        return back()->with('status', 'Profile updated successfully');
    }
}
```

## 4. Views

### Login Form

```php
// filepath: resources/views/auth/login.blade.php
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>

                        <a href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

## 5. Routes

```php
// filepath: routes/web.php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProfileController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});
```

## 6. Testing

```php
// filepath: tests/Feature/Auth/AuthenticationTest.php
namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/dashboard');
    }

    public function test_user_cannot_login_with_invalid_password()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password'
        ]);

        $this->assertGuest();
    }
}
```

## Penggunaan

### Mengecek Status Login & Info Login Terakhir

```php
@auth
    // User sudah login
    Terakhir login: {{ session('last_login_at') }} dari IP {{ session('last_login_ip') }}
@endauth

@guest
    // User belum login
@endguest
```

### Mengamankan Route

```php
Route::middleware(['auth', 'verified'])->group(function () {
    // Routes yang membutuhkan autentikasi
});
```

## Keamanan

1. Rate Limiting untuk Login

```php
// filepath: app/Providers/RouteServiceProvider.php
RateLimiter::for('login', function (Request $request) {
    return Limit::perMinute(5)->by($request->ip());
});
```

2. Validasi Password

```php
// filepath: app/Rules/Password.php
Password::defaults(function () {
    return Password::min(8)
        ->letters()
        ->mixedCase()
        ->numbers()
        ->uncompromised();
});
```
