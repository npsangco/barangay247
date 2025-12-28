<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barangay 24/7 - Your Community Information Portal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Hero Section -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Barangay 24/7</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Access barangay information and services anytime, anywhere. Connect with your community and stay informed.
                    </p>
                </div>

                <!-- Two-Column Cards -->
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto mt-8">
                    <!-- Resident Card -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden border-2 border-blue-100 hover:border-blue-300 transition">
                        <div class="px-8 py-10">
                            <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-6 mx-auto">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-6 px-4">I'm a Resident</h3>

                            <ul class="space-y-3.5 mb-8 px-2">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">View barangay projects</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">View community incidents</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Report incidents</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Access community feed</span>
                                </li>
                            </ul>

                            <div class="space-y-3 px-2">
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block w-full text-center px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-medium shadow-sm">
                                        Register as Resident
                                    </a>
                                @endif
                                <a href="{{ route('login') }}" class="block w-full text-center px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition font-medium">
                                    Already have an account? Log In
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Official Card -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden border-2 border-gray-200 hover:border-gray-300 transition">
                        <div class="px-8 py-10">
                            <div class="flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-6 mx-auto">
                                <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-6 px-4">I'm an Official/Employee</h3>

                            <ul class="space-y-3.5 mb-8 px-2">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Manage resident records</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Manage barangay projects</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Monitor incident reports</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-gray-700">Manage household records</span>
                                </li>
                            </ul>

                            <div class="space-y-3 px-2">
                                @if (Route::has('register.official'))
                                    <a href="{{ route('register.official') }}" class="block w-full text-center px-6 py-3 bg-slate-700 text-white rounded-md hover:bg-slate-800 transition font-medium shadow-sm">
                                        Register as Official
                                    </a>
                                @endif
                                <a href="{{ route('login') }}" class="block w-full text-center px-6 py-3 border-2 border-slate-700 text-slate-700 rounded-md hover:bg-slate-50 transition font-medium">
                                    Already have an account? Log In
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Section -->
                <div class="mt-16 text-center">
                    <p class="text-gray-600 max-w-3xl mx-auto">
                        Barangay 24/7 is your comprehensive community information system. Whether you're a resident looking to stay connected or an official managing community operations, our platform provides the tools and information you need, accessible 24 hours a day, 7 days a week.
                    </p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <p class="text-center text-gray-600 text-sm">
                    &copy; {{ date('Y') }} 4ITH Final Project Group 1. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
