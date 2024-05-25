<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('projects', [
            'projects' => Project::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project_create', [
            'statuses' => Project::STATUSES
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'note' => 'nullable',
            'status' => 'required|max:8'
        ]);
        $project = new Project($validated);
        $project->save();
        return redirect('/project');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('project', [
            'project' => Project::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('project_edit', [
            'project' => Project::all()->where('id', $id)->first(),
            'statuses' => Project::STATUSES
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'note' => 'nullable',
            'status' => 'required|max:8'
        ]);
        $project = Project::all()->where('id', $id)->first();
        $project->name = $validated['name'];
        $project->note = $validated['note'];
        $project->status = $validated['status'];
        $project->save();
        return redirect('/project');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::destroy($id);
        return redirect('/project');
    }
}
