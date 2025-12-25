<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function create(){
        return view('profile');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'project_name' => 'required|string|max:150',
            'project_description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'project_status' => 'required|string|max:100',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $project = Project::create([
            'project_name' => $validated['project_name'],
            'project_description' => $validated['project_description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'project_status' => $validated['project_status'],
            'image_path' => $request->hasFile('project_image') ? $request->file('project_image')->store('project_images', 'public') : null,
        ]);

        log_activity('Create', 'Projects', 'Created project: ' . $project->project_name);

        return redirect()->route('projects.index')->with("success", "Project created successfully.");
    }

    public function update(Request $request, $id){
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'project_name' => 'required|string|max:150',
            'project_description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'project_status' => 'required|string|max:100',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $updateData = [
            'project_name' => $validated['project_name'],
            'project_description' => $validated['project_description'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'project_status' => $validated['project_status'],
        ];

        if ($request->hasFile('project_image')) {
            $updateData['image_path'] = $request->file('project_image')->store('project_images', 'public');
        }

        $project->update($updateData);

        log_activity('Update', 'Projects', 'Updated project: ' . $project->project_name);

        return redirect()->route('projects.index')->with("success", "Project updated successfully.");
    }


    public function view(Request $request){
        $search = $request->input('search');

        if ($search) {
            $dgtProjects = Project::where('project_id', 'like', "%$search%")
                ->orWhere('project_name', 'like', "%$search%")
                ->orWhere('project_description', 'like', "%$search%")
                ->orWhere('start_date', 'like', "%$search%")
                ->orWhere('end_date', 'like', "%$search%")
                ->orWhere('deleted_at', 'like', "%$search%")
                ->get();
        } else {
            $dgtProjects = Project::all();
        }

        return view('projects', compact('dgtProjects'));
    }

    public function delete($id){
        $project = Project::findOrFail($id);
        $name = $project->project_name;
        $project->delete();

        log_activity('Delete', 'Projects', 'Deleted project: ' . $name);

        return redirect()->back();
    }

    public function restore($id){
        $project = Project::onlyTrashed()->find($id);
        $project->restore();
        return redirect()->back();
    }

    public function viewTrashed(Request $request){
        $search = $request->input('search');

        if ($search) {
            $dgtProjects = Project::where('project_id', 'like', "%$search%")
                ->orWhere('project_name', 'like', "%$search%")
                ->orWhere('project_description', 'like', "%$search%")
                ->orWhere('start_date', 'like', "%$search%")
                ->orWhere('end_date', 'like', "%$search%")
                ->orWhere('deleted_at', 'like', "%$search%")
                ->get();
        } else {
            //$dgtProjects = Project::all();
            $dgtProjects = Project::onlyTrashed()->get();
        }

        return view('projects_trashed', compact('dgtProjects'));
    }

    public function viewForResidents(Request $request){
        $search = $request->input('search');

        if ($search) {
            $dgtProjects = Project::where('project_id', 'like', "%$search%")
                ->orWhere('project_name', 'like', "%$search%")
                ->orWhere('project_description', 'like', "%$search%")
                ->orWhere('start_date', 'like', "%$search%")
                ->orWhere('end_date', 'like', "%$search%")
                ->get();
        } else {
            $dgtProjects = Project::all();
        }

        return view('projects_resident', compact('dgtProjects'));
    }

}
