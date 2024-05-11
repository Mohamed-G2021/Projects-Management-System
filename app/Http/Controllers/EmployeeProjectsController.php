<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeProjectsController extends Controller
{
    public function create(string $id){
        $employee = User::findorFail($id);
        $projects = Project::all();

        return view('employee-projects.create', compact('employee', 'projects'));
    }

    public function store(Request $request, string $id){
         $request->validate([
            'projects' =>'required',
        ]);

         $employee = User::findorFail($id);

         foreach($request->projects as $project){
             if($employee->projects->contains($project)) {
                 return redirect()->route('employees.index')->with(['message' => 'Project already assigned']);
             }
         }

        $employee->projects()->attach($request->projects);

        return redirect()->route('employees.index')->with(['message' => 'projects assigned successfully']);
    }
}
