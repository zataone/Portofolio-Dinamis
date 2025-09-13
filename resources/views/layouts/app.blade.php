<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0056FF;
            --text-color: #1A1D1F;
            --border-color: #EFEFEF;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(125.52deg, #F2F4F7 0%, #FFFFFF 72.38%);
            min-height: 100vh;
            line-height: 1.5;
            color: var(--text-color);
        }
        .card {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: #FFFFFF;
            box-shadow: 0px 2px 8px rgba(26, 29, 31, 0.05);
            max-width: 100%;
            margin: 0 auto;
        }
        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 16px;
            font-size: 15px;
            width: 100%;
            transition: all 0.2s ease;
            background-color: #FFFFFF;
            color: var(--text-color);
        }
        .form-control::placeholder {
            color: #9A9FA5;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 86, 255, 0.1);
            outline: none;
        }
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 16px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.2s ease;
            width: 100%;
            display: block;
            text-align: center;
            color: #FFFFFF;
        }
        .btn-primary:hover {
            background: #004BE0;
            box-shadow: 0 2px 4px rgba(0, 86, 255, 0.15);
        }
        .text-muted {
            color: #6b7280 !important;
        }
        .alert {
            border: none;
            border-radius: 12px;
            margin-bottom: 1.5rem;
        }
        .alert-success {
            background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
            color: white;
            padding: 1rem;
        }
        .form-label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
        }
        .btn-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
            padding: 0;
            background: none;
            border: none;
            font-size: 15px;
        }
        .btn-link:hover {
            color: #004BE0;
        }
        .form-label {
            color: var(--text-color);
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 12px;
            display: block;
        }
        .form-check-label {
            color: #6F767E;
            font-size: 15px;
        }
        .form-check-input {
            width: 20px;
            height: 20px;
            margin-top: 0;
            margin-right: 8px;
            border: 1px solid var(--border-color);
        }
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .input-group:focus-within .input-group-text {
            border-color: #4f46e5;
            color: #4f46e5;
        }
        .invalid-feedback {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem !important;
            }
            h2 {
                font-size: 1.5rem !important;
            }
            .btn-primary {
                padding: 10px 20px;
            }
        }
        @media (max-width: 576px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .card {
                border-radius: 12px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <main class="py-4">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>