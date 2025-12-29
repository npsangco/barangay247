<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Official;
use App\Models\Resident;
use App\Models\Households;
use App\Models\Incident;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        $projects = Project::onlyTrashed()->get();
        $officials = Official::onlyTrashed()->get();
        $residents = Resident::onlyTrashed()->get();
        $households = Households::onlyTrashed()->get();
        $incidents = Incident::onlyTrashed()->get();

        return view('archives', compact('projects', 'officials', 'residents', 'households', 'incidents'));
    }

    public function restoreProject($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();

        log_activity('Restore', 'Projects', 'Restored project: ' . $project->project_name);

        return redirect()->route('archives.index')->with('success', 'Project restored successfully.');
    }

    public function restoreOfficial($id)
    {
        $official = Official::onlyTrashed()->findOrFail($id);
        $official->restore();

        log_activity('Restore', 'Officials', 'Restored official: ' . $official->official_name);

        return redirect()->route('archives.index')->with('success', 'Official restored successfully.');
    }

    public function restoreResident($id)
    {
        $resident = Resident::onlyTrashed()->findOrFail($id);
        $resident->restore();

        log_activity('Restore', 'Residents', 'Restored resident: ' . $resident->resident_name);

        return redirect()->route('archives.index')->with('success', 'Resident restored successfully.');
    }

    public function restoreHousehold($id)
    {
        $household = Households::onlyTrashed()->findOrFail($id);
        $household->restore();

        log_activity('Restore', 'Households', 'Restored household: ' . $household->household_head);

        return redirect()->route('archives.index')->with('success', 'Household restored successfully.');
    }

    public function restoreIncident($id)
    {
        $incident = Incident::onlyTrashed()->findOrFail($id);
        $incident->restore();

        log_activity('Restore', 'Incidents', 'Restored incident: ' . $incident->incident_type);

        return redirect()->route('archives.index')->with('success', 'Incident restored successfully.');
    }
}
