<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectsDataTable;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectsDataTable $dataTable)
    {
        return $dataTable->render('projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $projectData = $request->validated();

        Project::create($projectData);

        return redirect()->route('projects.index')->with(['message' => 'project added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findorFail($id);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findorFail($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $project = Project::findorFail($id);

        $projectData = $request->validated();

        $project->update($projectData);

        return redirect()->route('projects.index')->with(['message' => 'project updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findorFail($id);

        $project->delete();
        return redirect()->route('projects.index')->with(['message' => 'project deleted successfully']);
    }
}
