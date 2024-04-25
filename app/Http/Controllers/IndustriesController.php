<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class IndustriesController extends Controller
{
    private $paginate = 10;
    public function viewStudents()
    {
        $companyId = auth()->user()->company_id;

        $students = Student::where('company_id', $companyId)
            ->whereNotNull('company_id')
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('industries.students.index', ['students' => $students]);
    }

}
