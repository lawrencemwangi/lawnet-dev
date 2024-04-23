<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.list_project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.add_project');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|unique:projects',
            'iframe' => 'required|url',
            'description' => 'required|string|',
            'link' => 'required|url',
        ]);

        $project = new Project;

        $project->title = $validated_data['title'];
        $project->iframe = $validated_data['iframe'];
        $project->link = $validated_data['link'];
        $project->description = $validated_data['description'];

        $project->save();

        return redirect()->route('projects.index')->with('success', [
            'message' => 'Project Created Successfully',
            'duration' => $this->alert_message_duration
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.update_project',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated_data = $request->validate([
            'title' => 'required|string|max:80|unique:projects,title,' . $project->id,
            'iframe' => 'required|url',
            'link' => 'required|url',
            'description' => 'required|string', // Change 'text' to 'string'
        ]);
  
        $project ->update($validated_data);

        return redirect()->route('projects.index')->with('success',[
            'message' => 'Project Updated Successfully',
            'duration' => $this->alert_message_duration
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
