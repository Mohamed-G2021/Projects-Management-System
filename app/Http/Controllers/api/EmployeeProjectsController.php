<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeProjectsController extends Controller
{
    public function store(Request $request, string $id){
        $employee = User::where('id', $id)->first();
        if($employee){
            $request->validate([
                'project' =>'required',
            ]);

            if($employee->projects->contains($request->project)){
                return response()->json([
                    'message' => 'Project already assigned'
                ], 400);
            }

            $employee->projects()->attach($request->project);

             return response()->json([
               'message' => 'Project assigned successfully',
             ]);
        }else{
            return response()->json([
               'message' => 'Employee not found'
            ], 404);
        }
    }
}
