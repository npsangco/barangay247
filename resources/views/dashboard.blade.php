<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">{{ __("Welcome to Barangay Management System") }}</h3>
                            <p>{{ __("You're logged in as ") }} <span class="font-semibold">{{ Auth::user()->name }}</span></p>
                        </div>
                        <div>
                            @if(Auth::user()->isAdmin())
                                <span class="px-4 py-2 bg-red-500 text-white rounded-full text-sm font-semibold">Admin</span>
                            @elseif(Auth::user()->isEmployee())
                                <span class="px-4 py-2 bg-blue-500 text-white rounded-full text-sm font-semibold">Employee</span>
                            @else
                                <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm font-semibold">Resident</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->isAdmin() || Auth::user()->isEmployee())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if(Auth::user()->isAdmin())
                <!-- Users Module (Admin Only) -->
                <a href="{{ route('users.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Users</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Manage user accounts and permissions</p>
                        </div>
                    </div>
                </a>

                <!-- Logs Module (Admin Only) -->
                <a href="{{ route('logs.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <svg class="w-8 h-8 text-orange-600 dark:text-orange-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Logs</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">View system activity logs</p>
                        </div>
                    </div>
                </a>
                @endif

                <!-- Projects Module -->
                <a href="{{ route('projects.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Projects</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Manage barangay projects and initiatives</p>
                        </div>
                    </div>
                </a>

                <!-- Officials Module -->
                <a href="{{ route('officials.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Officials</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">View barangay officials information</p>
                        </div>
                    </div>
                </a>

                <!-- Residents Module -->
                <a href="{{ route('residents.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Residents</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Manage resident records and information</p>
                        </div>
                    </div>
                </a>

                <!-- Households Module -->
                <a href="{{ route('households.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Households</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">View household data and statistics</p>
                        </div>
                    </div>
                </a>

                <!-- Incidents Module -->
                <a href="{{ route('incidents.index') }}" class="block">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <svg class="w-8 h-8 text-red-600 dark:text-red-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Incidents</h3>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Track and manage incident reports</p>
                        </div>
                    </div>
                </a>
            </div>
            @else
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Resident Access</h3>
                    <p class="mb-4">As a resident, you have limited access. You can:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>View your profile and update your information</li>
                        <li>View barangay projects and news</li>
                        <li>Report incidents (Coming soon)</li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
