<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login_store(Request $request)
    {
    	$phone = $request->phone;
    	$password = $request->password;
    	

    	$user= User::where('phone',$phone)->first();
    	if($user != null){
    		$user_phone = $user->phone;
	    	$user_password = $user->password;
	    	//dd($user_password,$user_phone);
	    	if(!Hash::check($password,$user_password ) && $user_phone == $phone){

	    		return redirect()->back()->with('status','Yor phone and password is invalid our record !');
	    	}else{
	    		
	    		return redirect()->route('frontend.index');

	    	}
    	}else{
    		return redirect()->back()->with('status','Yor phone and password is invalid our record !');

    	}
    	


    }

    public function backendLogin(){
        return view('auth.backendlogin');
    }
}
