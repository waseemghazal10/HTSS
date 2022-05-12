<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function loginUser(Request $request)
    {
        return view('loginUser');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->remember;
        error_log($remember);
 
        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();
 
            // return redirect()->intended('dashboard');
            return response([],201);
        }
 
        return response([
            'msg' => 'The provided credentials do not match our records.'],401);
    }

    public function successLogin(Request $request)
    {return view('successLogin');
    }
}