<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // echo "Hello World";
        return Employee::all();
    }

    public function store(Request $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department
        ]);
        return response()->json($employee);
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department
        ]);

        return response()->json([
            'message' => 'Updated Successfully'
        ]);
    }

    public function destroy($id)
    {
        Employee::destroy($id);

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}