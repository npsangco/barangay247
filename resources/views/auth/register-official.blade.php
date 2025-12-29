<x-guest-layout>
    <div class="mb-3">
        <h2 class="h4 fw-bold text-center" style="color: #3B4953;">Register as Official</h2>
        <p class="small text-center mt-1" style="color: #5A7863;">For barangay officials and employees</p>
    </div>

    <form method="POST" action="{{ route('register.official') }}">
        @csrf

        <div class="mb-3 p-3 rounded" style="background-color: #EBF4DD; border: 1px solid #90AB8B;">
            <p class="small mb-0" style="color: #3B4953;">
                <strong>Note:</strong> Valid registration code required. Contact admin if you don't have one.
            </p>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Name') }}</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
            <label for="official_id" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Select Your Position') }}</label>
            <select id="official_id" name="official_id" required class="form-select">
                <option value="">Select your official position</option>
                @foreach($officials as $official)
                    <option value="{{ $official->official_id }}" {{ old('official_id') == $official->official_id ? 'selected' : '' }}>
                        {{ $official->official_name }} - {{ $official->position }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('official_id')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="registration_code" class="form-label fw-semibold" style="color: #3B4953;">{{ __('Registration Code') }}</label>
            <input id="registration_code" class="form-control" type="password" name="registration_code" required>
            <x-input-error :messages="$errors->get('registration_code')" class="mt-2" />
            <p class="small text-muted mt-1">Contact the admin for the registration code</p>
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
                {{ __('Register as Official') }}
            </button>
        </div>

        <div class="mt-3 pt-3 text-center" style="border-top: 1px solid #EBF4DD;">
            <p class="small" style="color: #5A7863;">
                Resident?
                <a href="{{ route('register') }}" class="fw-medium text-primary-custom">
                    Register here
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
