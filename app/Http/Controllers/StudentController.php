<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Industry;
use App\Models\Logbook;
use App\Models\LogbookRelay;

class StudentController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $companyId = auth()->user()->company_id;

        $students = Student::where('company_id', $companyId)
            ->whereNotNull('company_id')
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('industries.students.index', compact('students'));
    }

    public function show($studentId)
    {

        $student = Student::findOrFail($studentId);
        $logbookIds = LogbookRelay::where('student_id', $studentId)->pluck('logbook_id')->toArray();

        $logbooks = Logbook::whereIn('id', $logbookIds)
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('industries.students.logbooks.index', compact('logbooks', 'student'));

    }
}
