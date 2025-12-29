<x-guest-layout>
    <div class="mb-4">
        <h2 class="h4 fw-bold text-center" style="color: #3B4953;">Register as Resident</h2>
        <p class="small text-center mt-1" style="color: #5A7863;">Create your account to access barangay services</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Full Name') }}</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Date of Birth') }}</label>
            <input id="date_of_birth" class="form-control" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Gender') }}</label>
            <select id="gender" name="gender" required class="form-select">
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="contact_information" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Contact Number') }}</label>
            <input id="contact_information" class="form-control" type="text" name="contact_information" value="{{ old('contact_information') }}" required placeholder="09XXXXXXXXX">
            <x-input-error :messages="$errors->get('contact_information')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="address" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Address') }}</label>
            <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" required>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="username" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Username') }}</label>
            <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" required autocomplete="username">
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a class="text-decoration-none text-primary-custom small"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-primary-custom px-4">
                {{ __('Register') }}
            </button>
        </div>

        <div class="mt-3 pt-3 text-center" style="border-top: 1px solid #EBF4DD;">
            <p class="small" style="color: #5A7863;">
                Barangay official?
                <a href="{{ route('register.official') }}" class="fw-medium text-primary-custom">
                    Register here
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
