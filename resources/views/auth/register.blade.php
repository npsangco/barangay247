<x-guest-layout>
    <div class="mb-4">
        <h2 class="text-xl font-bold text-center" style="color: #3B4953;">Register as Resident</h2>
        <p class="text-xs text-center mt-1" style="color: #5A7863;">Create your account to access barangay services</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" required
                    class="block mt-1 w-full rounded-md shadow-sm" style="border-color: #90AB8B;"
                    onfocus="this.style.borderColor='#5A7863'; this.style.boxShadow='0 0 0 3px rgba(144, 171, 139, 0.2)';"
                    onblur="this.style.borderColor='#90AB8B'; this.style.boxShadow='';">
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="contact_information" :value="__('Contact Number')" />
            <x-text-input id="contact_information" class="block mt-1 w-full" type="text" name="contact_information" :value="old('contact_information')" required placeholder="09XXXXXXXXX" />
            <x-input-error :messages="$errors->get('contact_information')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
            <a class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
               style="color: #5A7863;"
               onmouseover="this.style.color='#3B4953';"
               onmouseout="this.style.color='#5A7863';"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="mt-4 pt-4 text-center" style="border-top: 1px solid #EBF4DD;">
            <p class="text-xs" style="color: #5A7863;">
                Barangay official?
                <a href="{{ route('register.official') }}" class="font-medium"
                   style="color: #5A7863;"
                   onmouseover="this.style.color='#3B4953';"
                   onmouseout="this.style.color='#5A7863';">
                    Register here
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
