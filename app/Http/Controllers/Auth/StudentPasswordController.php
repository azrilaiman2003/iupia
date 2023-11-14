<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentPasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.students.changepassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::guard('student')->user();

        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->withInput()->withErrors(['password' => 'You cannot use the same password as the current one. Please choose a different password.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('student.dashboard')->with('success', 'Password changed successfully');
    }
}
