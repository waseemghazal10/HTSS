<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        return response([
            'msg' => 'The provided credentials do not match our records.'],401);
            
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $email = $request->email; 
        $password = $request->password;
        $remember = $request->remember;
        $users = User::where('Email',$email)->first(); 

        if($users->PassWord === $password){
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