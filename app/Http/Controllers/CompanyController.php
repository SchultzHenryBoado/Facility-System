<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data = Company::all();
        return view('admin.company', ['company' => $data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_code' => 'required',
            'company_name' => 'required'
        ]);

        Company::create($validated);

        return redirect('/company')->with('success', 'You created successfully!');
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'company_code' => 'required',
            'company_name' => 'required'
        ]);

        $company->update($validated);

        return redirect('/company')->with('updated', 'You updated successfully!');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect('/company')->with('deleted', 'You deleted successfully!');

    }

}
