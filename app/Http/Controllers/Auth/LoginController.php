<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
       //validate the form data
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=>'required|min:6',
        ]);

       //attempt to log the user in

        if (Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){

        //if successful, then redirect to their intended location
        return redirect('home');

        }
         //if unsuccessful, then redirect back to the loggin whit the form data errors

        return redirect()->back()->withInput($request->only('email','remember'));


    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
