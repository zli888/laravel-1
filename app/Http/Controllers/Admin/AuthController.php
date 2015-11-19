<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;


class AuthController extends Controller
{
	public function getLogin()
	{
		if (Auth::check()) {
            return redirect('admin/home');
        }
    	return view('admin.login');
	}
	
	public function postLogin(Request $request)
    {    
		$request = $request->only('email','password');
        if (Auth::attempt($request))
		{
            return redirect('admin/home');
        }
        return redirect()->back()->withErrors(['error' => '邮箱或密码错误！']);
    }
	public function getLogout()
	{
		Auth::logout();
		return redirect('admin/auth/login');
	}

}
