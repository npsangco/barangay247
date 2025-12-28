<x-guest-layout>
    <div class="mb-3">
        <h2 class="text-xl font-bold text-gray-900 text-center">Register as Official</h2>
        <p class="text-xs text-gray-600 text-center mt-1">For barangay officials and employees</p>
    </div>

    <form method="POST" action="{{ route('register.official') }}">
        @csrf

        <div class="mb-3 p-3 bg-blue-50 border border-blue-200 rounded-md">
            <p class="text-xs text-blue-800">
                <strong>Note:</strong> Valid registration code required. Contact admin if you don't have one.
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
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
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
            <p class="text-xs text-gray-500 mt-1">Contact the admin for the registration code</p>
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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register as Official') }}
            </x-primary-button>
        </div>

        <div class="mt-4 pt-4 border-t border-gray-200 text-center">
            <p class="text-xs text-gray-600">
                Resident?
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Register here
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
