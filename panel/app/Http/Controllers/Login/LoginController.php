<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function get_index(){
        return view('pages.login.login');
    }

    public function username(){
        return 'username';
    }

    public function post_handle(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        $userdata = [
            'username' => $username,
            'password' => $password,
        ];

        if(Auth::attempt($userdata))
            return redirect('/anasayfa');
        else
            return redirect('/');


    }
}
