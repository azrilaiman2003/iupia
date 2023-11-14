<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('id', 'DESC')->paginate(10);

        return view('admins.companies.index', compact('companies'));
    }

}
