<x-guest-layout>
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="login" class="form-label fw-semibold" style="color: #3B4953;">Email or Username</label>
            <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus autocomplete="username" class="form-control">
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold" style="color: #3B4953;">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
            <label for="remember_me" class="form-check-label text-secondary">
                Remember me
            </label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none text-primary-custom small">
                    Forgot your password?
                </a>
            @endif

            <button type="submit" class="btn btn-primary-custom px-4">
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>
