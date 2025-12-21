<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Official;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class OfficialRegistrationController extends Controller
{
    public function create(): View
    {
        $officials = Official::all();
        return view('auth.register-official', compact('officials'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'official_id' => ['required', 'exists:tbl_officials,official_id'],
            'registration_code' => ['required', 'string'],
        ]);

        if ($request->registration_code !== config('app.official_registration_code')) {
            return back()->withErrors(['registration_code' => 'Invalid registration code.'])->withInput();
        }

        $official = Official::where('official_id', $request->official_id)
            ->whereDoesntHave('user')
            ->first();

        if (!$official) {
            return back()->withErrors(['official_id' => 'This official already has an account.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee',
            'official_id' => $request->official_id,
            'resident_id' => null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        log_activity('Register', 'Auth', 'Official registered as employee: ' . $user->email);

        return redirect(route('dashboard', absolute: false));
    }
}
