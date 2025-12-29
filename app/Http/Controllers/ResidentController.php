<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;

class ResidentController extends Controller
{
    public function view(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $residents = Resident::where('resident_id', 'like', "%$search%")
                ->orWhere('resident_name', 'like', "%$search%")
                ->orWhere('gender', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->get();
        } else {
            $residents = Resident::all();
        }

        return view('residents', compact('residents'));
    }

    public function create()
    {
        return view('forms.residents-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female,Other',
            'contact' => ['required', 'regex:/^(09\d{9}|\+639\d{9})$/'],
            'address' => 'required|string|max:255',
        ]);

        $resident = Resident::create([
            'resident_name' => $validated['name'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'contact_information' => $validated['contact'],
            'address' => $validated['address'],
        ]);

        log_activity('Create', 'Residents', 'Created resident: ' . $resident->resident_name);

        return redirect()->route('residents.index')->with('success', 'Resident created successfully.');
    }

    public function edit($id)
    {
        $resident = Resident::findOrFail($id);
        return view('forms.residents-edit', compact('resident'));
    }

    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female,Other',
            'contact' => ['required', 'regex:/^(09\d{9}|\+639\d{9})$/'],
            'address' => 'required|string|max:255',
        ]);

        $resident->update([
            'resident_name' => $validated['name'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'contact_information' => $validated['contact'],
            'address' => $validated['address'],
        ]);

        log_activity('Update', 'Residents', 'Updated resident: ' . $resident->resident_name);

        return redirect()->route('residents.index')->with('success', 'Resident updated successfully.');
    }

    public function delete($id)
    {
        $resident = Resident::findOrFail($id);
        $name = $resident->resident_name;
        $resident->delete();

        log_activity('Delete', 'Residents', 'Deleted resident: ' . $name);

        return redirect()->back()->with('success', 'Resident deleted successfully.');
    }
}
