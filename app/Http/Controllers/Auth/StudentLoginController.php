<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.students.login');
    }

    public function showVerificationForm()
    {
        return view('auth.students.verification');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('student')->attempt($request->only('email', 'password'))) {
            $authenticatedUser = Auth::guard('student')->user();

            if ($authenticatedUser->is_first_login) {
                Session::put('first_time_login', true);
                $tac = $this->generateTac();
                $request->session()->put('tac', $tac);
                $this->sendTac($authenticatedUser->phone, $tac);

                return redirect()->route('student.verification')->with([
                    'phone' => $authenticatedUser->phone,
                ]);
            }

            return redirect()->route('student.dashboard');
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function verify(Request $request)
    {
        $enteredTac = $request->input('entered_tac');
        $storedTac = $request->session()->get('tac');

        if ($enteredTac !== null && $storedTac !== null && $enteredTac == $storedTac) {
            $request->session()->forget('tac');
            $authenticatedUser = Auth::guard('student')->user();
            $authenticatedUser->is_first_login = false;
            $authenticatedUser->save();

            return redirect()->route('student.password.change');
        }

        // $request->session()->forget('tac');
        return 'TAC is invalid . Entered Tac : ' . $enteredTac . ', Stored Tac : ' . $storedTac;
    }

    private function generateTac()
    {
        return mt_rand(100000, 999999);
    }

    private function sendTac($phoneNumber, $tac)
    {
        $token = 'xbat6Y0iyubr6n44a7ilbgAsWF8ArQNy';
        $url = 'https://terminal.adasms.com/api/v1/send';

        $data = [
            '_token' => $token,
            'phone' => $phoneNumber,
            'message' => "i-UPIA : Your First Time Login Code is: $tac",
            'callback_url' => 'https://myserver.com.my/callback_receive',
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return curl_error($ch);
        }

        curl_close($ch);
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
}
