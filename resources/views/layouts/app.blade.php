<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <style>
            :root {
                --bg-primary: #F5F2F2;
                --bg-secondary: #EBF4DD;
                --accent: #90AB8B;
                --primary: #5A7863;
                --text: #3B4953;
            }
            body {
                background-color: var(--bg-primary);
                color: var(--text);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }
            .btn-primary {
                background-color: var(--primary);
                border-color: var(--primary);
            }
            .btn-primary:hover {
                background-color: var(--accent);
                border-color: var(--accent);
            }
            .btn-outline-primary {
                color: var(--primary);
                border-color: var(--primary);
            }
            .btn-outline-primary:hover {
                background-color: var(--primary);
                border-color: var(--primary);
            }
            .btn-secondary {
                background-color: var(--text);
                border-color: var(--text);
            }
            .btn-secondary:hover {
                background-color: var(--accent);
                border-color: var(--accent);
            }
            .badge-primary {
                background-color: var(--accent);
                color: white;
            }
            .text-primary {
                color: var(--primary) !important;
            }
            .bg-primary {
                background-color: var(--primary) !important;
            }
            .border-primary {
                border-color: var(--accent) !important;
            }
            .card {
                border: none;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                background-color: white;
            }
            .card-header {
                background-color: var(--bg-secondary);
                border-bottom: 2px solid var(--accent);
                color: var(--text);
            }
            .form-control:focus,
            .form-select:focus {
                border-color: var(--accent);
                box-shadow: 0 0 0 0.25rem rgba(144, 171, 139, 0.25);
            }
            .alert-info {
                background-color: var(--bg-secondary);
                color: var(--text);
                border-color: var(--accent);
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow-sm py-3">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="py-4">
            {{ $slot }}
        </main>

        <footer class="py-4 mt-auto">
            <div class="container">
                <p class="text-center text-muted mb-0">
                    &copy; {{ date('Y') }} 4ITH Final Project Group 1. All rights reserved.
                </p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
