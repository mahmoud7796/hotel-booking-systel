<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register()
    {
        return view('site.auth.register');
    }

    public function forgetPassword()
    {
        return view('site.auth.forgetPassword');
    }

    public function store(CustomerRequest $request)
    {
        // return $request;
        try{
            Customer::create([
                'full_name' =>  $request->full_name,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
                'mobile' =>  $request->mobile,
                'address' =>  $request->address,
            ]);
            return redirect()->route('site.register')->with(['success'=>'Your Account created successfully! You Can Login Now']);

        }catch(\Exception $e){
             return $e;
            return redirect()->route('site.registe')->with(['error'=>'Something is wrong please try again later']);
            // return $e;
        }
    }

}
