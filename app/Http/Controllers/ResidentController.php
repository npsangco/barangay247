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
}
