<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndustryLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.industrial.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('industry')->attempt($request->only('email', 'password'))) {
            return redirect()->route('industry.dashboard');
        }

        return redirect()->back()->withInput($request->only('email'));
    }
}
