<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barangay Projects') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search Bar -->
            <form method="GET" action="{{ route('resident.projects') }}" class="mb-6">
                <div class="flex gap-2">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search projects by name, description, or status..."
                           class="flex-1 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    @if(request('search'))
                        <a href="{{ route('resident.projects') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Clear
                        </a>
                    @endif
                </div>
            </form>

            <!-- Project Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($projects as $project)
                    <article class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-lg transition overflow-hidden">
                        @if($project->image_path)
                            <div class="aspect-w-16 aspect-h-9 bg-gray-200 dark:bg-gray-700">
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->project_name }}" class="w-full h-48 object-cover">
                            </div>
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-purple-600">
                            </div>
                        @endif

                        <div class="p-5">
                            <div class="flex items-center mb-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $project->project_status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : '' }}
                                    {{ $project->project_status === 'ongoing' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : '' }}
                                    {{ $project->project_status === 'planning' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : '' }}">
                                    {{ ucfirst($project->project_status) }}
                                </span>
                                <span class="ml-auto text-xs text-gray-500 dark:text-gray-400">
                                    {{ $project->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-2">
                                <a href="{{ route('resident.project.show', $project->project_id) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                    {{ $project->project_name }}
                                </a>
                            </h3>

                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                                {{ Str::limit($project->project_description, 120) }}
                            </p>

                            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-4">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}
                            </div>

                            <a href="{{ route('resident.project.show', $project->project_id) }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                View Details
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">No projects available</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Check back later for new barangay projects.</p>
                    </div>
                @endforelse
            </div>

            <!-- pagination -->
            @if($projects->hasPages())
                <div class="mt-6">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
