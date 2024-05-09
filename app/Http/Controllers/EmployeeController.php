<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $employeeData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]
        );

        $employeeData['role'] = 'employee';

        User::create($employeeData);

        return redirect()->route('employees.index')->with(['message' => 'employee created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();

        if ($employee){
            return view('employees.show', compact('empolyee'));
        }else{
            return redirect()->back()->withErrors(['employee' => 'Employee not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();

        if ($employee){
            return view('employees.edit', compact('employee'));
        }else{
            return redirect()->back()->withErrors(['employee' => 'Employee not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employeeData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|password|confirmed'
            ]
        );

        $employeeData['role'] = 'employee';

        User::update($employeeData);

        return redirect()->back()->with(['employee' => 'employee updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();

        if ($employee){
            $employee->delete();
            return redirect()->back()->with(['employee' => 'employee deleted successfully']);
        }else{
            return redirect()->back()->withErrors(['employee' => 'Employee not found']);
        }
    }
}
