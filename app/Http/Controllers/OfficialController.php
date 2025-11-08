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

}
