<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class Login extends Controller
{
    function index()
    {
        return view('login');
    }

    function sign_in(Request $request){
        $this->validate($request,[
            'email'  => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        );

        if(!Auth::attempt($user_data))
        {
            // return redirect('Admin_controller/index');
            return redirect()->action('Admin_controller@index');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }
}
