<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
            }
            body {
                background: linear-gradient(135deg, #F5F2F2 0%, #EBF4DD 100%);
                min-height: 100vh;
                position: relative;
                overflow-x: hidden;
            }
            body::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image:
                    radial-gradient(circle at 20% 50%, rgba(144, 171, 139, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(90, 120, 99, 0.1) 0%, transparent 50%);
                pointer-events: none;
            }
            .bg-shape {
                position: fixed;
                border-radius: 50%;
                opacity: 0.15;
                z-index: 0;
            }
            .shape-1 {
                width: 400px;
                height: 400px;
                background: linear-gradient(135deg, #90AB8B, #5A7863);
                top: -100px;
                right: -100px;
            }
            .shape-2 {
                width: 300px;
                height: 300px;
                background: linear-gradient(225deg, #EBF4DD, #90AB8B);
                bottom: -80px;
                left: -80px;
            }
            .shape-3 {
                width: 200px;
                height: 200px;
                background: linear-gradient(45deg, #5A7863, #3B4953);
                top: 40%;
                left: 10%;
                opacity: 0.08;
            }
            .wave-shape {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 200px;
                z-index: 0;
                opacity: 0.3;
            }
            .auth-card {
                background: white;
                border: 2px solid #90AB8B;
                position: relative;
                z-index: 1;
            }
            .btn-primary-custom {
                background-color: #5A7863;
                border-color: #5A7863;
                color: white;
            }
            .btn-primary-custom:hover {
                background-color: #3B4953;
                border-color: #3B4953;
                color: white;
            }
            .form-control:focus {
                border-color: #90AB8B;
                box-shadow: 0 0 0 0.25rem rgba(144, 171, 139, 0.25);
            }
            .form-check-input:checked {
                background-color: #5A7863;
                border-color: #5A7863;
            }
            .text-primary-custom {
                color: #5A7863;
            }
            .text-primary-custom:hover {
                color: #3B4953;
            }
        </style>
    </head>
    <body>
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>
        <div class="bg-shape shape-3"></div>

        <svg class="wave-shape" viewBox="0 0 1200 200" preserveAspectRatio="none">
            <path d="M0,100 C300,150 600,50 900,100 C1050,125 1200,100 1200,100 L1200,200 L0,200 Z" fill="#90AB8B" opacity="0.3"/>
            <path d="M0,120 C300,170 600,70 900,120 C1050,145 1200,120 1200,120 L1200,200 L0,200 Z" fill="#5A7863" opacity="0.2"/>
        </svg>

        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-5" style="position: relative; z-index: 1;">
            <div class="mb-4 text-center">
                <a href="/" class="text-decoration-none">
                    <h1 class="h2 fw-bold mb-2" style="color: #3B4953;">Barangay 24/7</h1>
                    <p class="text-secondary">Your Community Information Portal</p>
                </a>
            </div>

            <div class="auth-card shadow-lg rounded-3 p-4 w-100" style="max-width: 450px;">
                {{ $slot }}
            </div>

            <div class="mt-4">
                <a href="/" class="text-decoration-none text-secondary">
                    ← Back to Home
                </a>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
