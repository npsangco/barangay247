<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Project;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogHelper;

class UserFeedController extends Controller
{
    public function index()
    {
        $incidents = Incident::with('resident')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $projects = Project::whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('userUI.feed', compact('incidents', 'projects'));
    }

    public function incidents()
    {
        $incidents = Incident::with('resident', 'official')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('userUI.incidents', compact('incidents'));
    }

    public function projects()
    {
        $projects = Project::whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('userUI.projects', compact('projects'));
    }

    public function createIncident()
    {
        $user = Auth::user();
        if (!$user->isResident() || !$user->resident_id) {
            return redirect()->route('userUI.feed')->with('error', 'Only residents can report incidents.');
        }
        return view('userUI.create-incident');
    }

    public function storeIncident(Request $request)
    {
        $user = Auth::user();
        if (!$user->isResident() || !$user->resident_id) {
            return redirect()->route('userUI.feed')->with('error', 'Only residents can report incidents.');
        }
        $validated = $request->validate([
            'incident_type' => 'required|string|max:255',
            'incident_details' => 'required|string',
        ]);
        $incident = Incident::create([
            'resident_id' => $user->resident_id,
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
        return redirect()->route('userUI.incidents')->with('success', 'Incident reported successfully!');
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
