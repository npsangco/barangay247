<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report an Incident') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700 dark:text-blue-300">
                                    Your report will be reviewed by barangay officials. Please provide as much detail as possible to help us address the issue effectively.
                                </p>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-400 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.incident.store') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="incident_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Incident Type <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="incident_type"
                                   id="incident_type"
                                   value="{{ old('incident_type') }}"
                                   placeholder="e.g., Noise Complaint, Street Light Issue, Road Damage, etc."
                                   class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                   required>
                            @error('incident_type')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <div class="mt-3 flex flex-wrap gap-2">
                                <button type="button" onclick="document.getElementById('incident_type').value='Noise Complaint'" class="px-3 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600">
                                    Noise Complaint
                                </button>
                                <button type="button" onclick="document.getElementById('incident_type').value='Street Light Issue'" class="px-3 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600">
                                    Street Light Issue
                                </button>
                                <button type="button" onclick="document.getElementById('incident_type').value='Road Damage'" class="px-3 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600">
                                    Road Damage
                                </button>
                                <button type="button" onclick="document.getElementById('incident_type').value='Waste Management'" class="px-3 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600">
                                    Waste Management
                                </button>
                                <button type="button" onclick="document.getElementById('incident_type').value='Water Supply Issue'" class="px-3 py-1 text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600">
                                    Water Supply Issue
                                </button>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="incident_details" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Incident Details <span class="text-red-500">*</span>
                            </label>
                            <textarea name="incident_details"
                                      id="incident_details"
                                      rows="8"
                                      placeholder="Please provide a detailed description of the incident, including location, time, and any other relevant information..."
                                      class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                      required>{{ old('incident_details') }}</textarea>
                            @error('incident_details')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                Be as specific as possible. Include addresses, times, and any other details that will help us investigate.
                            </p>
                        </div>
                        <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-md">
                            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Reporting As:</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ Auth::user()->resident ? Auth::user()->resident->resident_name : Auth::user()->name }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                Report will be submitted at {{ now()->format('M d, Y h:i A') }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('user.incidents') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Submit Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
