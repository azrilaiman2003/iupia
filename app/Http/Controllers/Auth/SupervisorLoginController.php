<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupervisorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.supervisors.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('supervisor')->attempt($request->only('email', 'password'))) {
            return redirect()->route('supervisor.dashboard');
        }

        return redirect()->back()->withInput($request->only('email'));
    }
}
