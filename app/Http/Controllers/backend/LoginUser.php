<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Request;



class LoginUser extends Controller
{
    //Đăng nhập
    function getdangnhap(){
        return view('frontend.loginuser');
    }
    function postdangnhap(){
        $username = Request::input('username');
        $password = Request::input('password');
        $datauser=['name'=>$username,'password'=>$password];


            if(Auth::attempt($datauser))
            {
                $name=Auth::user()->fullname;
                Request::session()->put('loginuser', true);
                Request::session()->put('name', $name);

                return redirect()->route('user');
            }
            else {
                return redirect()->route('loginuser')->with('fail', 'Đăng nhập không thành công, sai username hoặc password.');
        }

    }
    //Đăng xuất
    function dangxuat(){


        if(Auth::check())
        {
            Auth::logout();

        }
        Request::session()->flush();
        return redirect()->route('loginuser')->with('fail', 'Đăng Xuất thành công');
    }
    //Đăng kí
    function getregis(){
        return view('frontend.registration');
    }
    function postregis(RegistrationRequest $request){


        $row=new User;
        $row->fullname=$request->fullname;
        $row->name=$request->name;
        $password=$request->password;
// To create a valid password out of laravel Try out!
            $cost=10; // Default cost
            $passwordh = password_hash($password, PASSWORD_BCRYPT, ['cost' => $cost]);

        $row->password=$passwordh;
        $row->email=$request->email;
        if ($request->nam)
        {
            $row->gender=1;
        }
        else{
            $row->gender=2;
        }

        $row->phone=$request->phone;
        $row->access=2;
        $row->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->created_by=0;
        $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->updated_by=0;
        $row->status=1;
        $row->save();
        return redirect()->route("loginuser")->with('fail', 'Đăng Ky thành công');
    }
}
