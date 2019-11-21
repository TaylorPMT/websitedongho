<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function getlogin()
    {
        return view('backend.page.user.login');
    }
    function postlogin(REQUEST $request)
    {   $name=$request->username;
        $pass=$request->password;
       $data=['name'=>$name,'password'=>$pass,'access'=>1];
       if(Auth::attempt($data))
       {
        return redirect()->route('Dashboard');
       }
       else
       {
           echo "Nhập sai rồi";
       }

    }
    function logout()
    {
       if(Auth::check())
       {
        Auth::logout();
       }
       return redirect()->route('login');

    }
}
