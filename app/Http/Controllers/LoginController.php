<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
// use Illuminate\Support\Facades\Auth;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogout()
    {
        Auth::logout();
        return view('admin.login');
    }
    public function getLogin()
    {
    	return view('admin.login');
    }
    public function postLogin(LoginRequest $request)
    {
    	$login= array(
    		'name' =>$request->txtUser , 
    		'password' =>$request->txtPassword
    	);
    	if(Auth::attempt($login))
    	{
           // if (Auth::user()->level == 1) {
           //     return "Admin";
           // } else {
           //  return "No Admin";
           // }
    	   return redirect()->route('admin.cate.list');
    	}
    	else
    	{
    		return redirect()->back()->with('error','Vui lòng kiểm tra lại tài khoản hoặc mật khẩu !!!');
    	}
    }
}
