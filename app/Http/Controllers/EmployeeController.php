<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
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
    public function store(StoreEmployeeRequest $request)
    {
        $employeeData = $request->validated();

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
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = User::findorFail($id);

        $employeeData = $request->validated;

        $employeeData['role'] = 'employee';

        $employee->update($employeeData);

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
