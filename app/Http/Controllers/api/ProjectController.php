<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        if($projects){
            return response()->json($projects);
        }else{
            return response()->json([
                'message' => 'Projects not found'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $projectData = $request->validated();

        $project = Project::create($projectData);

        return response()->json([
            'message' => 'project added successfully',
            'project' => $project
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::where('id', $id)->first();

        if($project){
            return response()->json($project);
        }else{
            return response()->json([
                'message' => 'Project not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $project = Project::where('id', $id)->first();

        if($project){
            $projectData = $request->validated();

            $project->update($projectData);

            return response()->json([
                'message' => 'project updated successfully',
                'project' => $project
            ]);
        }else{
            return response()->json([
                'message' => 'project not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::where('id', $id)->first();

        if($project){
            $project->delete();
            return response()->json([
                'message' => 'project deleted successfully'
            ]);
        }else{
            return response()->json([
                'message' => 'project not found'
            ], 404);
        }
    }
}
