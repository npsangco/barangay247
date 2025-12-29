<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay 24/7 - Your Community Information Portal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #EBF4DD;">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Barangay 24/7</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-light">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-success ms-2">Log In</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3 text-dark">Welcome to Barangay 24/7</h1>
                <p class="lead text-secondary">
                    Access barangay information and services anytime, anywhere.<br>
                    Connect with your community and stay informed.
                </p>
            </div>

            <!-- Cards Section -->
            <div class="row mt-5">
            <!-- Cards Section -->
            <div class="row mt-5">
                <!-- Resident Card -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-success border-2 shadow">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px; background-color: #EBF4DD !important;">
                                <svg width="35" height="35" fill="none" stroke="#5A7863" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>

                            <h3 class="card-title h4 fw-bold mb-4 text-dark">I'm a Resident</h3>

                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">View barangay projects</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">View community incidents</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">Report incidents</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">Access community feed</span>
                                </li>
                            </ul>

                            <div class="d-grid gap-2">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-success btn-lg">
                                        Register as Resident
                                    </a>
                                @endif
                                <a href="{{ route('login') }}" class="btn btn-outline-success btn-lg">
                                    Already have an account? Log In
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Official Card -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100 border-success border-2 shadow">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px; background-color: #EBF4DD !important;">
                                <svg width="35" height="35" fill="none" stroke="#3B4953" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>

                            <h3 class="card-title h4 fw-bold mb-4 text-dark">I'm an Official/Employee</h3>

                            <ul class="list-unstyled text-start mb-4">
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">Manage resident records</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">Manage barangay projects</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">Monitor incident reports</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <svg class="text-success me-2 flex-shrink-0" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-dark">Manage household records</span>
                                </li>
                            </ul>

                            <div class="d-grid gap-2">
                                @if (Route::has('register.official'))
                                    <a href="{{ route('register.official') }}" class="btn btn-dark btn-lg">
                                        Register as Official
                                    </a>
                                @endif
                                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-lg">
                                    Already have an account? Log In
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Section -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="lead text-secondary">
                        Barangay 24/7 is your comprehensive community information system. Whether you're a resident looking to stay connected or an official managing community operations, our platform provides the tools and information you need, accessible 24 hours a day, 7 days a week.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p class="mb-0 text-white text-secondary">
                        &copy; {{ date('Y') }} 4ITH Final Project Group 1. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
