<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('resident.incidents') }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Incident Report') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                INCIDENT REPORT
                            </span>
                            <h1 class="mt-3 text-2xl font-bold text-gray-900 dark:text-gray-100">
                                {{ $incident->incident_type }}
                            </h1>
                        </div>
                        <div class="text-right text-sm text-gray-500 dark:text-gray-400">
                            <p>Report #{{ $incident->report_id }}</p>
                            <p class="mt-1">{{ $incident->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/30">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Reported By
                            </h3>
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $incident->resident ? $incident->resident->resident_name : 'Anonymous' }}
                                    </p>
                                    @if($incident->resident && $incident->resident->contact_information)
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $incident->resident->contact_information }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Date Reported
                            </h3>
                            <p class="text-sm text-gray-900 dark:text-gray-100 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $incident->date_reported ? \Carbon\Carbon::parse($incident->date_reported)->format('M d, Y') : 'N/A' }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                {{ $incident->created_at->diffForHumans() }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Assigned Official
                            </h3>
                            @if($incident->official)
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $incident->official->official_name }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $incident->official->position ?? 'Barangay Official' }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm">Pending Assignment</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-4">
                        Incident Details
                    </h3>
                    <div class="prose dark:prose-invert max-w-none">
                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $incident->incident_details }}</p>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/30 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('resident.incidents') }}" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Back to Incidents
                        </a>

                        @if(Auth::user()->resident_id === $incident->resident_id)
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                You reported this incident
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700 dark:text-blue-300">
                            Barangay officials will review this report and take appropriate action. You may be contacted for additional information.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
