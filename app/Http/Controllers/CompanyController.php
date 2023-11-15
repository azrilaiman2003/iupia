<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Companies::orderBy('id', 'DESC')->paginate(10);

        return view('admins.companies.index', compact('companies'));
    }

    public function show()
    {

        return view('admins.companies.index');
    }

    public function create()
    {
        return view('admins.companies.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|unique:companies,company_name',
        ]);

        $input = $request->all();

        Companies::create($input);

        return redirect()->route('admin.manage.company.index')
            ->with('success', "Company $request->company_name created successfully.");
    }

    public function edit($id)
    {
        $company = Companies::findOrFail($id);

        return view('admins.companies.edit', compact('company'));
    }

    public function destroy($id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.manage.company.index')
            ->with('success', "Company $company->company_name deleted successfully.");
    }

}
