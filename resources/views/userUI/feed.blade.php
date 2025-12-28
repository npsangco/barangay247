<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Feed') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search Bar -->
            <form method="GET" action="{{ route('resident.home') }}" class="mb-6">
                <div class="flex gap-2">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search projects and incidents..."
                           class="flex-1 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    @if(request('search'))
                        <a href="{{ route('resident.home') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Clear
                        </a>
                    @endif
                </div>
            </form>

            <div class="space-y-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Barangay Projects
                        </h3>
                    </div>
                    <div class="p-6">
                        @forelse($projects->take(5) as $project)
                            <article class="mb-4 p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-gray-300 dark:hover:border-gray-600 transition">
                                <div class="flex items-start">
                                    <!-- projects content -->
                                    <div class="flex-1">
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-2">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 mr-2">
                                                PROJECT
                                            </span>
                                            <span>Posted {{ $project->created_at->diffForHumans() }}</span>
                                            <span class="mx-2">•</span>
                                            <span class="font-medium">Status: {{ ucfirst($project->project_status) }}</span>
                                        </div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                            <a href="{{ route('resident.project.show', $project->project_id) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                                {{ $project->project_name }}
                                            </a>
                                        </h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">
                                            {{ Str::limit($project->project_description, 200) }}
                                        </p>
                                        @if($project->image_path)
                                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->project_name }}" class="mt-2 rounded-lg max-h-64 object-cover">
                                        @endif
                                        <div class="flex items-center space-x-4 text-xs text-gray-500 dark:text-gray-400 mt-3">
                                            <span>{{ $project->start_date }} - {{ $project->end_date }}</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No projects to display.</p>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            Community Incidents
                        </h3>
                    </div>
                    <div class="p-6">
                        @forelse($incidents->take(5) as $incident)
                            <article class="mb-4 p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:border-gray-300 dark:hover:border-gray-600 transition">
                                <div class="flex items-start">
                                    <!-- incident contents -->
                                    <div class="flex-1">
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-2">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 mr-2">
                                                INCIDENT
                                            </span>
                                            <span>Reported by {{ $incident->resident ? $incident->resident->resident_name : 'Unknown' }}</span>
                                            <span class="mx-2">•</span>
                                            <span>{{ $incident->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                                <a href="{{ route('resident.incident.show', $incident->report_id) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                                {{ $incident->incident_type }}
                                            </a>
                                        </h4>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                                            {{ Str::limit($incident->incident_details, 200) }}
                                        </p>
                                        <div class="flex items-center space-x-4 text-xs text-gray-500 dark:text-gray-400 mt-3">
                                            <button class="hover:text-gray-700 dark:hover:text-gray-300 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                </svg>
                                                View Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No incidents reported yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
