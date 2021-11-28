<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequset;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function postLogin(AdminLoginRequset $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            if($request->has('rememberme')){
                Cookie::queue('adminEmail',$request->email,1440);
                Cookie::queue('adminPassword',$request->password,1440);
            }
            return redirect()->route('admin.dashboard');
    }else
            return redirect()->back()-> with(['error' =>'Email Or Password Is Wrong']);
    }

    public function logout()
    {
        $gaurd = $this->getGaurd();
        $gaurd->logout();
        return redirect()->route('admin.login');
    }

    private function getGaurd()
    {
        return auth('admin');
    }

    public function forgetPassword()
    {
        return view('admin.auth.forgetPassword');

    }
}
