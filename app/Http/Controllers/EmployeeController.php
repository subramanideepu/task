<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;

class EmployeeController extends Controller
{
    // Method to export employees to an Excel file
    public function export() 
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    // Method to import employees from an Excel file
    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new EmployeesImport, $request->file('file'));

        return redirect()->route('employees.index')->with('success', 'Employees imported successfully!');
    }

    // Display a listing of employees
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required|max:255',
            'employee_department' => 'required|max:255',
            'employee_id' => 'required|max:255',
            'employee_designation' => 'required|max:255',
            'employee_contact' => 'required|numeric',
            'employee_email' => 'required|email',
        ]);

        Employee::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    // Show the form for editing an existing employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    // Update an existing employee in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'employee_name' => 'required|max:255',
            'employee_department' => 'required|max:255',
            'employee_id' => 'required|max:255',
            'employee_designation' => 'required|max:255',
            'employee_contact' => 'required|numeric',
            'employee_email' => 'required|email',
        ]);

        Employee::whereId($id)->update($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    // Remove an employee from the database
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
