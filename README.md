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

