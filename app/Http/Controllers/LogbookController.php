<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use App\Models\Student;
use App\Models\institution;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{

    private $paginate = 10;

    public function index()
    {
        //student view
        if (auth()->guard('student')->check()) {
            $studentId = auth()->user()->id;

            $logbooks = Logbook::whereIn('student_id', $studentId)
                ->orderBy('id', 'DESC')
                ->paginate($this->paginate);

            $logbooks->each(function ($logbook) {
                $logbook->categoryLabel = $this->getCategoryLabel($logbook->category);
            });

            return view('students.logbooks.index', compact('logbooks'));
        } else if (auth()->guard('industry')->check()) {
            //industry supervisor view

            $studentId = request()->route('studentId');

            $logbooks = Logbook::where('student_id', $studentId)
                ->orderBy('id', 'DESC')
                ->paginate($this->paginate);

            $logbooks->each(function ($logbook) {
                $logbook->categoryLabel = $this->getCategoryLabel($logbook->category);
            });

            return view('industries.students.logbooks.index', [
                'logbooks' => $logbooks,
                'studentId' => $studentId,
            ]);
        } else if (auth()->guard('supervisor')->check()) {
            //college supervisor view
            dd("college supervisor");
        } else {
            dd("else");
        }
    }

    public function indexIndustry()
    {

        $companyId = auth()->user()->company_id;

        $students = Student::where('company_id', $companyId)
            ->whereNotNull('company_id')
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('industries.students.index', compact('students'));
    }

    public function create()
    {
        return view('students.logbooks.create');
    }

    public function show(Logbook $logbook)
    {
        //student view
        if (auth()->guard('student')->check()) {
            $studentId = auth()->user()->id;

            $hasPermission = Logbook::where('student_id', $studentId)
                ->where('logbook_id', $logbook->id)
                ->exists();

            if (!$hasPermission) {
                return redirect()->route('student.logbook.index')
                    ->with('error', 'You do not have permission to view this logbook.');
            }

            return view('students.logbooks.show', [
                'logbook' => $logbook,
                'category' => $this->getCategoryLabel($logbook->category),
            ]);
        } else if (auth()->guard('industry')->check()) {
            //industry supervisor view
            $studentId = request()->route('studentId');

            $logbook = Logbook::findOrFail(request()->route('logbookId'));

            // $hasPermission = LogbookRelay::where('student_id', $studentId)
            //     ->where('logbook_id', $logbook->id)
            //     ->exists();

            // if (!$hasPermission) {
            //     return redirect()->route('industry.student.show', $studentId)
            //         ->with('error', 'You do not have permission to view this logbook.');
            // }

            return view('industries.students.logbooks.show', [
                'logbook' => $logbook,
                'category' => $this->getCategoryLabel($logbook->category),
                'studentId' => $studentId,
            ]);
        } else if (auth()->guard('supervisor')->check()) {
            //college supervisor view
            dd("college supervisor");
        } else {
            dd("else");
        }
    }

    public function edit(Logbook $logbook)
    {
        $studentId = auth()->user()->id;

        $hasPermission = Logbook::where('student_id', $studentId)
            ->where('logbook_id', $logbook->id)
            ->exists();

        if (!$hasPermission) {
            return redirect()->route('student.logbook.index')
                ->with('error', 'You do not have permission to edit this logbook.');
        }

        return view('students.logbooks.edit', compact('logbook'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'date' => 'required',
            'hari' => 'required',
            'location' => 'required',
            'field1' => 'required',
            'field2' => 'required',
            'field3' => 'required',
            'field4' => 'required',
            'file' => 'nullable',
        ]);

        $date = Carbon::createFromFormat('d/m/Y', $request->input('date'))->format('Y-m-d');

        $request->merge(['date' => $date]);

        $logbook = new Logbook($request->all());
        $logbook->save();

        $studentId = Auth::id();

        Logbook::update([
            'student_id' => $studentId,
        ]);

        return redirect()->route('student.logbook.index')
            ->with('success', 'Logbook created successfully.');
    }

    public function update(Request $request, Logbook $logbook)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'date' => 'required',
            'hari' => 'required',
            'location' => 'required',
            'field1' => 'required',
            'field2' => 'required',
            'field3' => 'required',
            'field4' => 'required',
        ]);

        $date = Carbon::createFromFormat('d-M-Y', $request->input('date'))->format('Y-m-d');
        $request->merge(['date' => $date]);

        $logbook->update($request->all());

        return redirect()->route('logbook')
            ->with('success', 'Logbook updated successfully');
    }

    public function destroy(Logbook $logbook)
    {

        $studentId = auth()->user()->id;

        $hasPermission = Logbook::where('student_id', $studentId)
            ->where('logbook_id', $logbook->id)
            ->exists();

        if (!$hasPermission) {
            return redirect()->route('student.logbook.index')
                ->with('error', 'You do not have permission to delete this logbook.');
        }

        $logbook->delete();

        return redirect()->route('logbook')
            ->with('success', 'Logbook deleted successfully');
    }

    public function generatePdf($id)
    {
        $logbook = Logbook::findOrFail($id);
        $categoryLabel = $this->getCategoryLabel($logbook->category);
        $categoryLabel = strtoupper($categoryLabel);

        $pdf = PDF::loadView('students.logbooks.pdf', compact('logbook', 'categoryLabel'));

        return response($pdf->stream())->header('Content-Type', 'application/pdf');
    }

    public function returnPdf($id, Request $request){

        $studentId = $request->input('student_id');
        $companyId = $request->input('company_id');

        if ($id == 'page1') {
        $detail = institution::findOrFail(1);

        $pdf = PDF::loadView('layouts.logbooks.main', compact('detail'));
        return response($pdf->stream())->header('Content-Type', 'application/pdf');

        } else if ($id == 'page2') {

            dd("page2");
        }
    }

    public function getCategoryLabel($category)
    {
        switch ($category) {
            case 1:
                return 'Harian';
            case 2:
                return 'Bulanan';
            case 3:
                return 'Akhir';
            default:
                return 'Unknown Category';
        }
    }

    public function approve($logbookId)
    {
        $logbook = Logbook::findOrFail($logbookId);

        $logbook->update([
            'status' => 1,
        ]);

        return redirect()->route('industry.view.student')
            ->with('success', 'Logbook approved successfully.');
    }

    public function reject($logbookId)
    {
        $logbookId->update([
            'status' => 2,
        ]);

        return redirect()->route('industry.view.student')
            ->with('success', 'Logbook rejected successfully.');
    }
}
