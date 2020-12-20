<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jobtitle;


use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function process_signup(array $input)
    {
    	Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => 'required',
            'phone' => 'required'
        ])->validate();

        $role = $input['role'];

        $user =User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
        ]);
        $user->assignRole($role);

        return view('auth.signup_detail', compact('user'));

    }

    public function reg_step(){

    	$user = User::find(3);
    	$jobtitles = Jobtitle::orderBy('name')->get();

    	$profiles = array(
    		"profiles/profile_1.png", "profiles/profile_2.png", "profiles/profile_3.png", "profiles/profile_4.png",
    		"profiles/profile_5.png", "profiles/profile_6.png", "profiles/profile_7.png", "profiles/profile_8.png",
    		"profiles/profile_9.png", "profiles/profile_10.png", "profiles/profile_11.png", "profiles/profile_12.png",
    		"profiles/profile_13.png", "profiles/profile_14.png", "profiles/profile_15.png", "profiles/profile_16.png",
    		"profiles/profile_17.png", "profiles/profile_18.png", "profiles/profile_19.png", "profiles/profile_20.png",
    		"profiles/profile_21.png", "profiles/profile_22.png", "profiles/profile_23.png", "profiles/profile_24.png",
    		"profiles/profile_25.png", "profiles/profile_26.png", "profiles/profile_27.png", "profiles/profile_28.png",
    		"profiles/profile_29.png", "profiles/profile_30.png", "profiles/profile_31.png", "profiles/profile_32.png",
    		"profiles/profile_33.png", "profiles/profile_34.png", "profiles/profile_35.png", "profiles/profile_36.png",
    	);

    	// Instructor
        // return view('auth.instructor_signup',compact('user','jobtitles','profiles'));

        // Company
        return view('auth.company_signup',compact('user','jobtitles','profiles'));

    }
}
