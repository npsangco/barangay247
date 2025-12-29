<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Official;

class OfficialController extends Controller
{
    public function view(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $officials = Official::where('official_id', 'like', "%$search%")
                ->orWhere('official_name', 'like', "%$search%")
                ->orWhere('position', 'like', "%$search%")
                ->orWhere('contact_information', 'like', "%$search%")
                ->get();
        } else {
            $officials = Official::all();
        }

        return view('officials', compact('officials'));
    }

    public function create()
    {
        return view('forms.officials-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'contact' => ['required', 'regex:/^(09\d{9}|\+639\d{9})$/'],
            'term_start' => 'required|date',
            'term_end' => 'required|date|after_or_equal:term_start',
        ]);

        $official = Official::create([
            'official_name' => $validated['name'],
            'position' => $validated['position'],
            'contact_information' => $validated['contact'],
            'term_start' => $validated['term_start'],
            'term_end' => $validated['term_end'],
        ]);

        log_activity('Create', 'Officials', 'Created official: ' . $official->official_name);

        return redirect()->route('officials.index')->with('success', 'Official created successfully.');
    }

    public function edit($id)
    {
        $official = Official::findOrFail($id);
        return view('forms.officials-edit', compact('official'));
    }

    public function update(Request $request, $id)
    {
        $official = Official::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'contact' => ['required', 'regex:/^(09\d{9}|\+639\d{9})$/'],
            'term_start' => 'required|date',
            'term_end' => 'required|date|after_or_equal:term_start',
        ]);

        $official->update([
            'official_name' => $validated['name'],
            'position' => $validated['position'],
            'contact_information' => $validated['contact'],
            'term_start' => $validated['term_start'],
            'term_end' => $validated['term_end'],
        ]);

        log_activity('Update', 'Officials', 'Updated official: ' . $official->official_name);

        return redirect()->route('officials.index')->with('success', 'Official updated successfully.');
    }

    public function delete($id)
    {
        $official = Official::findOrFail($id);
        $name = $official->official_name;
        $official->delete();

        log_activity('Delete', 'Officials', 'Deleted official: ' . $name);

        return redirect()->back()->with('success', 'Official deleted successfully.');
    }
}
