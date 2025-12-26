<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Community Incidents') }}
            </h2>
            <a href="{{ route('user.incident.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Report Incident
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @forelse($incidents as $incident)
                        <article class="mb-4 p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-gray-300 dark:hover:border-gray-600 transition hover:shadow-md">
                            <div class="flex items-start">
                                <!-- contents -->
                                <div class="flex-1">
                                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-2">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 mr-2">
                                            INCIDENT
                                        </span>
                                        <span class="font-medium">{{ $incident->resident ? $incident->resident->resident_name : 'Anonymous' }}</span>
                                        <span class="mx-2">•</span>
                                        <span>{{ $incident->created_at->diffForHumans() }}</span>
                                        @if($incident->official)
                                            <span class="mx-2">•</span>
                                            <span class="text-green-600 dark:text-green-400">Assigned to {{ $incident->official->official_name }}</span>
                                        @endif
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                        <a href="{{ route('user.incident.show', $incident->report_id) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                            {{ $incident->incident_type }}
                                        </a>
                                    </h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">
                                        {{ Str::limit($incident->incident_details, 300) }}
                                    </p>
                                    <div class="flex items-center space-x-4 text-xs text-gray-500 dark:text-gray-400">
                                        <a href="{{ route('user.incident.show', $incident->report_id) }}" class="hover:text-gray-700 dark:hover:text-gray-300 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                            </svg>
                                            View Full Report
                                        </a>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $incident->date_reported ? \Carbon\Carbon::parse($incident->date_reported)->format('M d, Y') : 'N/A' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">No incidents reported</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by reporting an incident.</p>
                            <div class="mt-6">
                                <a href="{{ route('user.incident.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Report Incident
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- pagination -->
                @if($incidents->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $incidents->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
