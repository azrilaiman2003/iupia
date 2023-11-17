<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\LogbookRelay;

class LogbookController extends Controller
{

    private $paginate = 10;

    public function index()
    {
        $studentId = auth()->user()->id;

        $logbookIds = LogbookRelay::where('student_id', $studentId)
        ->pluck('logbook_id');

        $logbooks = Logbook::whereIn('id', $logbookIds)
        ->orderBy('id', 'DESC')
        ->paginate($this->paginate);

        $logbooks->each(function ($logbook) {
            $logbook->categoryLabel = $this->getCategoryLabel($logbook->category);
        });

        return view('students.logbooks.index', compact('logbooks'));
    }

    public function create()
    {
        return view('students.logbooks.create');
    }

    public function show(Logbook $logbook)
    {
        $studentId = auth()->user()->id;

        $hasPermission = LogbookRelay::where('student_id', $studentId)
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
    }

    public function edit(Logbook $logbook)
    {
        $studentId = auth()->user()->id;

        $hasPermission = LogbookRelay::where('student_id', $studentId)
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
        ]);

        $date = Carbon::createFromFormat('d/m/Y', $request->input('date'))->format('Y-m-d');

        $request->merge(['date' => $date]);

        $logbook = new Logbook($request->all());
        $logbook->save();

        $studentId = Auth::id();

        LogbookRelay::create([
            'logbook_id' => $logbook->id,
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

        $hasPermission = LogbookRelay::where('student_id', $studentId)
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
}
