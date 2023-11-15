<?php

namespace App\Http\Controllers;

use App\Exports\SampleExport;
use Illuminate\Http\Request;
use App\Models\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;

class ImportStudentController extends Controller
{
    public function index()
    {
        $importStudents = ImportStudent::orderBy('id', 'DESC')->paginate(10);

        return view('admins.import-students.index', compact('importStudents'));
    }

    public function create()
    {
        return view('admin.import-students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:import_students,name',
        ]);

        $input = $request->all();

        ImportStudent::create($input);

        return redirect()->route('admin.manage.import-student.index')
            ->with('success', "Import Student $request->name created successfully.");
    }

    public function show(ImportStudent $importStudent)
    {
        $importStudent = ImportStudent::query()
            ->with([
                'students',
            ])
            ->where('id', $importStudent->id)
            ->firstOrFail();

        return view('admins.import-students.show', [
            'importStudent' => $importStudent,
        ]);
    }

    public function upload(Request $request, ImportStudent $importStudent)
    {
        try {
        Excel::import(
            new StudentImport(
                $importStudent->getKey(),
            ), $request->file('file'));

            return redirect()
            ->back()
            ->withSuccess("Import Student $importStudent->name uploaded successfully.");

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->getMessage());
        }
    }

    public function sample()
    {
        $header = [
            [
            'Name',
            'IC Number',
            'College Number',
            'Email',
            'Phone',
            ],
        ];

        return Excel::download(new SampleExport($header), 'student-import-sample.xslx');
    }

}
