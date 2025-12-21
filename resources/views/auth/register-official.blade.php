<x-guest-layout>
    <form method="POST" action="{{ route('register.official') }}">
        @csrf

        <div class="mb-4 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-md">
            <p class="text-sm text-blue-800 dark:text-blue-200">
                <strong>Official Registration</strong><br>
                This form is for barangay officials only. You need a valid registration code to proceed.
            </p>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="official_id" :value="__('Select Your Position')" />
            <select id="official_id" name="official_id" required
                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">Select your official position</option>
                @foreach($officials as $official)
                    <option value="{{ $official->official_id }}" {{ old('official_id') == $official->official_id ? 'selected' : '' }}>
                        {{ $official->official_name }} - {{ $official->position }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('official_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="registration_code" :value="__('Registration Code')" />
            <x-text-input id="registration_code" class="block mt-1 w-full" type="password" name="registration_code" required />
            <x-input-error :messages="$errors->get('registration_code')" class="mt-2" />
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Contact the admin for the registration code</p>
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register as Official') }}
            </x-primary-button>
        </div>

        <div class="mt-4 text-center">
            <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100" href="{{ route('register') }}">
                Register as Resident instead
            </a>
        </div>
    </form>
</x-guest-layout>
