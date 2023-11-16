<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\Industry;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Companies::orderBy('id', 'DESC')->paginate(10);

        return view('admins.companies.index', compact('companies'));
    }

    public function show(Companies $company)
    {
        $students = Student::paginate(1);
        $totalStudentsCount = Student::count();
        $supervisors = Supervisor::paginate(1);
        $totalSupervisorsCount = Supervisor::count();
        $industries = Industry::paginate(1);
        $totalIndustriesCount = Industry::count();

        return view('admins.companies.show', [
            'students' => $students,
            'totalStudentsCount' => $totalStudentsCount,
            'supervisors' => $supervisors,
            'totalSupervisorsCount' => $totalSupervisorsCount,
            'industries' => $industries,
            'company' => $company,
            'totalIndustriesCount' => $totalIndustriesCount,
        ]);
    }

    public function assignToCompany(Request $request, $assignTo, $assigneeId, $companyId)
    {
        $company = Companies::find($companyId);

        if ($company) {
            if ($assignTo === 'student') {
                $student = Student::find($assigneeId);
                if ($student) {
                    $student->company_id = $company->id;
                    $student->save();
                    return redirect()->back()->with('success', 'Student assigned to company successfully');
                }
            } elseif ($assignTo === 'supervisor') {
                $supervisor = Supervisor::find($assigneeId);
                if ($supervisor) {
                    $supervisor->company_id = $company->id;
                    $supervisor->save();
                    return redirect()->back()->with('success', 'Supervisor assigned to company successfully');
                }
            } elseif ($assignTo === 'industry') {
                $industry = Industry::find($assigneeId);
                if ($industry) {
                    $industry->company_id = $company->id;
                    $industry->save();
                    return redirect()->back()->with('success', 'Industry assigned to company successfully');
                }
            }
        }

        return redirect()->back()->with('error', 'Failed to assign');
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
