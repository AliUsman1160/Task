<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('Companies.Companies', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Companies.addcompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies,email',
            'website' => 'nullable|string|max:255',
            'logo' => 'required|image|dimensions:min_width=100,min_height=100'
        ], [
            'email.unique' => 'The email has already been taken.'
        ]);
        
    
        if ($request->hasFile('logo') && !$request->file('logo')->isValid()) {
            return redirect()->back()->withInput()->withErrors(['logo' => 'The logo is not valid.']);
        }
    
        $logoPath = $request->file('logo')->store('public/logos');
        $logoPathWithoutPublic = str_replace('public/', '', $logoPath);
        
        $company = new Company([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logoPathWithoutPublic,
        ]);
    
        $company->save();
    
        return redirect()->route('companies')->with('add', true);
    }
    
    /**s
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
        $company = Company::findOrFail($id);   
        return view('Companies.editcomapany', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100'
        ]);
    
        // Retrieve the company by ID
        $company = Company::findOrFail($id);
    
        // Update the company attributes
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
    
        // Handle logo update
        if ($request->hasFile('logo')) {
            // Validate the new logo
            if (!$request->file('logo')->isValid()) {
                return redirect()->back()->withInput()->withErrors(['logo' => 'The logo is not valid.']);
            }
    
            // Store the new logo
            $logoPath = $request->file('logo')->store('public/logos');
            $logoPathWithoutPublic = str_replace('public/', '', $logoPath);
            $company->logo = $logoPathWithoutPublic;
        }
    
        // Save the updated company
        $company->save();
    
        // Redirect back with success message
        return redirect()->route('companies')->with('update', true);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the company from the database based on the ID
        $company = Company::findOrFail($id);
    
        // Delete the company
        $company->delete();
    
        // Optionally, delete the associated logo file
        if ($company->logo) {
            Storage::delete('public/' . $company->logo);
        }
    
        // Redirect back with a success message
        return redirect()->route('companies')->with('delete', true);
    }
}
