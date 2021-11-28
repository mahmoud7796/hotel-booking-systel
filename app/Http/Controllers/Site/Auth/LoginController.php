<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequset;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login(){
        return view('site.auth.login');
    }

    public function postLogin(AdminLoginRequset $request)
    {
        if (auth()->guard('customer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            if($request->has('rememberme')){
                Cookie::queue('userEmail',$request->email,1440);
                Cookie::queue('userPassword',$request->password,1440);
            }
            return redirect()->route('site.home');
    }else
            return redirect()->back()-> with(['error' =>'Email Or Password Is Wrong']);
    }

    public function logout()
    {
        $gaurd = $this->getGaurd();
        $gaurd->logout();
        return redirect()->route('site.login');
    }

    private function getGaurd()
    {
        return auth('customer');
    }

    public function forgetPassword()
    {
        return view('admin.auth.forgetPassword');

    }
}
