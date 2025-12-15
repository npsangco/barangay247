<?php

namespace App\Http\Controllers;

use App\Models\Households;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{
    public function create()
    {
        return view('householdForm');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'head' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'contact' => ['required', 'regex:/^(09\d{9}|\+639\d{9})$/'],
            'members' => 'required|integer|min:1|max:50',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->hasFile('pic') ? $request->file('pic')->store('household_images', 'public') : null;

        Households::create([
            'household_head' => $validated['head'],
            'address' => $validated['address'],
            'contact_information' => $validated['contact'],
            'number_of_members' => $validated['members'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('households.index')->with('success', 'Household Registered Successfully!');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $households = Households::where('household_head', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('contact_information', 'like', "%$search%")
                ->orWhere('number_of_members', 'like', "%$search%")
                ->get();
        } else {
            $households = Households::all();
        }

        return view('households', compact('households'));
    }

    public function delete($id)
    {
        $household = Households::findOrFail($id);
        $household->delete();
        return redirect()->back()->with('success', 'Household deleted successfully.');
    }
}