<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('resident.projects') }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Project Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($project->image_path)
                <div class="mb-6 rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->project_name }}" class="w-full h-96 object-cover">
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    BARANGAY PROJECT
                                </span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $project->project_status === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : '' }}
                                    {{ $project->project_status === 'ongoing' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : '' }}
                                    {{ $project->project_status === 'planning' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : '' }}">
                                    {{ ucfirst($project->project_status) }}
                                </span>
                            </div>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                                {{ $project->project_name }}
                            </h1>
                        </div>
                        <div class="text-right text-sm text-gray-500 dark:text-gray-400">
                            <p>Project #{{ $project->project_id }}</p>
                            <p class="mt-1">Posted {{ $project->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/30">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Start Date
                            </h3>
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($project->start_date)->format('F d, Y') }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
                                Target Completion
                            </h3>
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($project->end_date)->format('F d, Y') }}
                            </p>
                        </div>
                    </div>

                    @php
                        $start = \Carbon\Carbon::parse($project->start_date);
                        $end = \Carbon\Carbon::parse($project->end_date);
                        $now = \Carbon\Carbon::now();
                        $totalDays = $start->diffInDays($end);
                        $elapsedDays = $start->diffInDays($now);
                        $progress = $totalDays > 0 ? min(100, ($elapsedDays / $totalDays) * 100) : 0;

                        if ($project->project_status === 'completed') {
                            $progress = 100;
                        }
                    @endphp

                    <div class="mt-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Progress</span>
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ round($progress) }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider mb-4">
                        Project Description
                    </h3>
                    <div class="prose dark:prose-invert max-w-none">
                        <p class="text-gray-700 dark:text-gray-300 text-base leading-relaxed whitespace-pre-wrap">{{ $project->project_description }}</p>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/30 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('resident.projects') }}" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Projects
                    </a>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-900 rounded-md p-3">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Duration</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $start->diffInDays($end) }} days
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-100 dark:bg-green-900 rounded-md p-3">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ ucfirst($project->project_status) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-100 dark:bg-purple-900 rounded-md p-3">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Days Remaining</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $project->project_status === 'completed' ? '0' : max(0, $now->diffInDays($end)) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
