<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;

class IncidentController extends Controller
{
    public function view(Request $request){
        $search = $request->input('search');

        if($search){
            $incidents = Incident::join('tbl_residents', 'tbl_incidents.resident_id', 'tbl_residents.resident_id')
            ->where('tbl_incidents.report_id', 'like', "%$search%")
            ->orWhere('tbl_residents.resident_name', 'like', "%$search%")
            ->orWhere('tbl_incidents.incident_details', 'like', "%$search%")
            ->select('tbl_incidents.*', 'tbl_residents.resident_name')
            ->get();    
        } else {
            $incidents = Incident::join('tbl_residents', 'tbl_incidents.resident_id', 'tbl_residents.resident_id')
            ->select('tbl_incidents.*', 'tbl_residents.resident_name')
            ->get();
        }
          
        return view('incidents', compact('incidents'));
    }
}
