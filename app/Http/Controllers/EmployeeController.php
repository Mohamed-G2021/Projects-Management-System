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

        return redirect()->route('employees.index')->with(['message' => 'employee added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = User::findorFail($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = User::findorFail($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findorFail($id);

        $employeeData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$user->id,
            ]
        );

        $employeeData['role'] = 'employee';

        $user->update($employeeData);

        return redirect()->route('employees.index')->with(['message' => 'employee updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = User::findorFail($id);

        $employee->delete();
        return redirect()->route('employees.index')->with(['message' => 'employee deleted successfully']);
    }
}
