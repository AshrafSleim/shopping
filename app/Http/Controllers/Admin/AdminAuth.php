<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class AdminAuth extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function dologin(){
//        $emil=$request->input('email');
//        $password=$request->input('password');
//        if( $password=='123456'){
//            return redirect('admin');
//        }else{
//
//            session()->flash('error',trans('admin.incorrectLogin'));
//            return redirect('admin/login');
//       }
        $rememberme=request('rememberme')==1?true : false;
        if (admin()->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme)){
            return redirect('admin');
        }else{

            session()->flash('error',trans('admin.incorrectLogin'));
            return redirect(aurl('login'));
        }
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect(aurl('login'));
    }
    public function forgot_password(){
        return view('admin.forgot_password');
    }
    public function forgot_password_post(){

    }

}
