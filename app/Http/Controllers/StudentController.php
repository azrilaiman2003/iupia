<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $paginate = 10;

    public function index()
    {

        $supervisorId = auth()->user()->id;

        $students = Student::orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('students.index', compact('students'));
    }
}
