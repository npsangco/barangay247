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
        $project = Project::create([
            'project_name' => $request->input('project_name'),
            'project_description' => $request->input('project_description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'project_status' => $request->input('project_status'),
            'image_path' => $request->hasFile('project_image') ? $request->file('project_image')->store('project_image', 'public') : null,
        ]);

        return redirect()->route('projects.index')->with("success", "Project has been listed successfully.");
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
        $project->delete();
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


}
