<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Project;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogHelper;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $incidents = Incident::with('resident')
            ->when($search, function ($query, $search) {
                return $query->where('incident_type', 'like', "%{$search}%")
                    ->orWhere('incident_details', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $projects = Project::whereNull('deleted_at')
            ->when($search, function ($query, $search) {
                return $query->where('project_name', 'like', "%{$search}%")
                    ->orWhere('project_description', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('userUI.feed', compact('incidents', 'projects'));
    }

    public function incidents(Request $request)
    {
        $search = $request->input('search');

        $incidents = Incident::with('resident', 'official')
            ->when($search, function ($query, $search) {
                return $query->where('incident_type', 'like', "%{$search}%")
                    ->orWhere('incident_details', 'like', "%{$search}%")
                    ->orWhereHas('resident', function ($q) use ($search) {
                        $q->where('resident_name', 'like', "%{$search}%");
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('userUI.incidents', compact('incidents'));
    }

    public function projects(Request $request)
    {
        $search = $request->input('search');

        $projects = Project::whereNull('deleted_at')
            ->when($search, function ($query, $search) {
                return $query->where('project_name', 'like', "%{$search}%")
                    ->orWhere('project_description', 'like', "%{$search}%")
                    ->orWhere('project_status', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('userUI.projects', compact('projects'));
    }

    public function createIncident()
    {
        return view('userUI.create-incident');
    }

    public function storeIncident(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'incident_type' => 'required|string|max:255',
            'incident_details' => 'required|string',
        ]);

        $incident = Incident::create([
            'resident_id' => $user->resident_id ?? null,
            'incident_type' => $validated['incident_type'],
            'incident_details' => $validated['incident_details'],
            'date_reported' => now(),
        ]);

        LogHelper::log(
            Auth::id(),
            'Incident Report Created',
            'incidents',
            $incident->report_id,
            null,
            json_encode($incident->toArray())
        );

        return redirect()->route('resident.incidents')->with('success', 'Incident reported successfully!');
    }

    public function showIncident($id)
    {
        $incident = Incident::with('resident', 'official')->findOrFail($id);
        return view('userUI.show-incident', compact('incident'));
    }

    public function showProject($id)
    {
        $project = Project::findOrFail($id);
        return view('userUI.show-project', compact('project'));
    }
}
