<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.employees', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all(); // Assuming you have a Company model
        
        return view('employees.addemployee', compact('companies'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'company_id' => 'required|exists:companies,id',
            'phone' => 'nullable|string|max:20',
        ]);
    
        $employee = new Employee([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone,
        ]);
    
        $employee->save();
    
        return redirect()->route('employees')->with('add', true);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
    
        $companies = Company::all();
    
        return view('employees.editemployee', compact('employee', 'companies'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);
    
        // Find the employee by ID
        $employee = Employee::findOrFail($id);
    
        // Update the employee record
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    
        // Redirect back to the employee list page with a success message
        return redirect()->route('employees')->with('update', true);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $employee = Employee::findOrFail($id);
    
        $employee->delete();
    
        
        return redirect()->route('employees')->with('delete', true);
    }
    
}
