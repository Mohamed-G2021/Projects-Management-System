<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::where('role', 'employee')->get();

        if($employees){
            return EmployeeResource::collection($employees);
        }else{
            return response()->json([
               'message' => 'Employees not found'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employeeData = $request->validated();

        $employee = User::create($employeeData);

        return response()->json([
           'message' => 'Employee added successfully',
            'employee' => new EmployeeResource($employee),
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::where('id', $id)->first();

        if($employee){
            return new EmployeeResource($employee);
        }else{
            return response()->json([
               'message' => 'Employee not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = User::where('id', $id)->first();

        if($employee){
            $employeeData = $request->validated();

            $employee->update($employeeData);

            return response()->json([
                'message' => 'Employee updated successfully',
                'employee' => new EmployeeResource($employee),
            ]);
        }else{
            return response()->json([
               'message' => 'Employee not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = User::where('id', $id)->first();

        if($employee){
            $employee->delete();
            return response()->json([
               'message' => 'Employee deleted successfully'
            ]);
        }else{
            return response()->json([
               'message' => 'Employee not found'
            ], 404);
        }
    }
}
