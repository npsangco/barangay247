<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Edit User: {{ $user->name }}</h2>

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-md">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                   class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                   class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Role</label>
                            <select name="role" id="role" required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>Employee</option>
                                <option value="resident" {{ old('role', $user->role) == 'resident' ? 'selected' : '' }}>Resident</option>
                            </select>
                        </div>

                        <div class="mb-4" id="resident-field">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Link to Resident</label>
                            <select name="resident_id"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="">None</option>
                                @foreach($residents as $resident)
                                    <option value="{{ $resident->resident_id }}" {{ old('resident_id', $user->resident_id) == $resident->resident_id ? 'selected' : '' }}>
                                        #{{ $resident->resident_id }} - {{ $resident->resident_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6" id="official-field">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Link to Official</label>
                            <select name="official_id"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="">None</option>
                                @foreach($officials as $official)
                                    <option value="{{ $official->official_id }}" {{ old('official_id', $user->official_id) == $official->official_id ? 'selected' : '' }}>
                                        #{{ $official->official_id }} - {{ $official->official_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex gap-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Update User
                            </button>
                            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            const residentField = document.getElementById('resident-field');
            const officialField = document.getElementById('official-field');

            if (this.value === 'resident') {
                residentField.style.display = 'block';
                officialField.style.display = 'none';
                document.querySelector('[name="official_id"]').value = '';
            } else if (this.value === 'employee') {
                residentField.style.display = 'none';
                officialField.style.display = 'block';
                document.querySelector('[name="resident_id"]').value = '';
            } else {
                residentField.style.display = 'none';
                officialField.style.display = 'none';
                document.querySelector('[name="resident_id"]').value = '';
                document.querySelector('[name="official_id"]').value = '';
            }
        });

        document.getElementById('role').dispatchEvent(new Event('change'));
    </script>
</x-app-layout>
