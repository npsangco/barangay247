<x-guest-layout>
    <div class="mb-3 text-secondary">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold" style="color: #3B4953;">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('login') }}" class="text-decoration-none text-primary-custom small">
                Back to Login
            </a>

            <button type="submit" class="btn btn-primary-custom px-4">
                Email Password Reset Link
            </button>
        </div>
    </form>
</x-guest-layout>
