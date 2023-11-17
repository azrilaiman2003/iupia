<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Industry;
use App\Models\Supervisor;

class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id = auth()->user()->id;

        if ($user) {
            $guard = Auth::getDefaultDriver();

            switch ($guard) {
                case 'student':
                    $data = Student::findOrfail($id);
                    return view('students.settings.index', compact('data'));
                    break;
                case 'industry':
                    $data = Industry::findOrfail($id);
                    return view('industries.settings.index', compact('data'));
                    break;
                case 'supervisor':
                    $data = Supervisor::findOrfail($id);
                    return view('supervisors.settings.index', compact('data'));
                    break;
                default:
                    // Handle other cases or redirect if necessary
                    break;
            }
        }
    }
}
