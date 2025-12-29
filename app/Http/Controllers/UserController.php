<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resident;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $users = User::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('role', 'like', "%$search%")
                ->get();
        } else {
            $users = User::all();
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $officials = Official::all();
        return view('users.create', compact('officials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'official_id' => 'required|exists:tbl_officials,official_id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'employee',
            'official_id' => $validated['official_id'],
            'resident_id' => null,
        ]);

        log_activity('Create', 'Users', 'Created employee account: ' . $user->email);

        return redirect()->route('users.index')->with('success', 'Employee account created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $residents = Resident::all();
        $officials = Official::all();

        return view('users.edit', compact('user', 'residents', 'officials'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,employee,resident',
            'resident_id' => 'nullable|exists:tbl_residents,resident_id',
            'official_id' => 'nullable|exists:tbl_officials,official_id',
        ]);

        $user->update($validated);

        log_activity('Update', 'Users', 'Updated user: ' . $user->email);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
