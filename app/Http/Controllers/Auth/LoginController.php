<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

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
            $credentials = $request->only('phone', 'password');

            if (Auth::attempt($credentials)) {
                // if success login

                $role = $user->getRoleNames();
                if ($role[0] == "Business") {
                    return redirect('panel');
                }
                else{
                    return redirect('/');
                }

                
            }
            // if failed login
            return redirect()->back()->with('status','Your phone and password is invalid our record !');

	    	
    	}else{
    		return redirect()->back()->with('status','Your phone and password is invalid our record !');

    	}


    }

    public function backsidelogin_store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        

        $user= User::where('email',$email)->first();
        if($user != null){

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // if success login

                return redirect('panel');
            }
            // if failed login
            return redirect()->back()->with('status','Your email is invalid our record !');

            
        }else{
            return redirect()->back()->with('status','Your email is invalid our record !');

        }


    }

    public function backendLogin(){
        return view('auth.backendlogin');
    }
}
