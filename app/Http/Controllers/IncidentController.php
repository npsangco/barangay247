<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Resident;
use App\Models\Official;

class IncidentController extends Controller
{
    public function view(Request $request){
        $search = $request->input('search');

        if($search){
            $incidents = Incident::join('tbl_residents', 'tbl_incidents.resident_id', 'tbl_residents.resident_id')
            ->leftJoin('tbl_officials', 'tbl_incidents.official_id', 'tbl_officials.official_id')
            ->where('tbl_incidents.report_id', 'like', "%$search%")
            ->orWhere('tbl_residents.resident_name', 'like', "%$search%")
            ->orWhere('tbl_incidents.incident_details', 'like', "%$search%")
            ->select('tbl_incidents.*', 'tbl_residents.resident_name', 'tbl_officials.official_name')
            ->get();
        } else {
            $incidents = Incident::join('tbl_residents', 'tbl_incidents.resident_id', 'tbl_residents.resident_id')
            ->leftJoin('tbl_officials', 'tbl_incidents.official_id', 'tbl_officials.official_id')
            ->select('tbl_incidents.*', 'tbl_residents.resident_name', 'tbl_officials.official_name')
            ->get();
        }

        $residents = Resident::all();
        $officials = Official::all();

        return view('incidents', compact('incidents', 'residents', 'officials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'resident_id' => 'required|exists:tbl_residents,resident_id',
            'official_id' => 'nullable|exists:tbl_officials,official_id',
            'incident_type' => 'required|string|max:100',
            'incident_details' => 'required|string',
            'date_reported' => 'required|date',
        ]);

        $incident = Incident::create($validated);

        log_activity('Create', 'Incidents', 'Created incident report: ' . $incident->report_id);

        return redirect()->route('incidents.index')->with('success', 'Incident reported successfully.');
    }

    public function update(Request $request, $id)
    {
        $incident = Incident::findOrFail($id);

        $validated = $request->validate([
            'resident_id' => 'required|exists:tbl_residents,resident_id',
            'official_id' => 'nullable|exists:tbl_officials,official_id',
            'incident_type' => 'required|string|max:100',
            'incident_details' => 'required|string',
            'date_reported' => 'required|date',
        ]);

        $incident->update($validated);

        log_activity('Update', 'Incidents', 'Updated incident report: ' . $incident->report_id);

        return redirect()->route('incidents.index')->with('success', 'Incident updated successfully.');
    }

    public function delete($id)
    {
        $incident = Incident::findOrFail($id);
        $reportId = $incident->report_id;
        $incident->delete();

        log_activity('Delete', 'Incidents', 'Deleted incident report: ' . $reportId);

        return redirect()->back()->with('success', 'Incident deleted successfully.');
    }

    public function viewForResidents(Request $request)
    {
        $search = $request->input('search');
        $user = auth()->user();

        // Get the resident record associated with this user
        $resident = $user->resident_id ? Resident::find($user->resident_id) : null;

        if($search){
            $incidents = Incident::join('tbl_residents', 'tbl_incidents.resident_id', 'tbl_residents.resident_id')
            ->leftJoin('tbl_officials', 'tbl_incidents.official_id', 'tbl_officials.official_id')
            ->where('tbl_incidents.resident_id', $resident->resident_id ?? 0)
            ->where(function($query) use ($search) {
                $query->where('tbl_incidents.report_id', 'like', "%$search%")
                    ->orWhere('tbl_incidents.incident_type', 'like', "%$search%")
                    ->orWhere('tbl_incidents.incident_details', 'like', "%$search%");
            })
            ->select('tbl_incidents.*', 'tbl_residents.resident_name', 'tbl_officials.official_name')
            ->get();
        } else {
            $incidents = Incident::join('tbl_residents', 'tbl_incidents.resident_id', 'tbl_residents.resident_id')
            ->leftJoin('tbl_officials', 'tbl_incidents.official_id', 'tbl_officials.official_id')
            ->where('tbl_incidents.resident_id', $resident->resident_id ?? 0)
            ->select('tbl_incidents.*', 'tbl_residents.resident_name', 'tbl_officials.official_name')
            ->get();
        }

        return view('incidents_resident', compact('incidents', 'resident'));
    }

    public function storeByResident(Request $request)
    {
        $user = auth()->user();

        if (!$user->resident_id) {
            return redirect()->back()->with('error', 'Your account is not linked to a resident profile. Please contact the administrator.');
        }

        $resident = Resident::find($user->resident_id);

        if (!$resident) {
            return redirect()->back()->with('error', 'Your resident profile was not found. Please contact the administrator.');
        }

        $validated = $request->validate([
            'incident_type' => 'required|string|max:100',
            'incident_details' => 'required|string',
            'date_reported' => 'required|date',
        ]);

        $incident = Incident::create([
            'resident_id' => $resident->resident_id,
            'official_id' => null,
            'incident_type' => $validated['incident_type'],
            'incident_details' => $validated['incident_details'],
            'date_reported' => $validated['date_reported'],
        ]);

        log_activity('Create', 'Incidents', 'Resident reported incident: ' . $incident->report_id);

        return redirect()->route('incidents.resident')->with('success', 'Incident reported successfully.');
    }
}
