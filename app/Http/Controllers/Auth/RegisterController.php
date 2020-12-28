<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jobtitle;
use App\Models\Instructor;
use App\Models\Company;

use Redirect;
use Auth;

use App\Http\Controllers\MailController;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SignupNotification;

class RegisterController extends Controller
{
    public function process_signup(Request $input)
    {
        $role = $input['role'];

        Validator::make($input->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required',
            'phone' => ['required','unique:users'],
        ])->validate();

        $verification_code = sha1(time());

        if($role == 'Student'){
            $user =User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
            ]);
        

        }else{
            $user =User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'verification_code' => $verification_code,
            ]);
        }

        $signupnoti = [
                'userid' => $user->id,
                'name' => $input['name'],
                'phoneno' => $input['phone'],
                'email' => $input['email'],
                'role' => $role
            ];

        Notification::send($user,new SignupNotification($signupnoti));
        
        $user->assignRole($role);

        

        if ($role == 'Student') {
            $credentials = $input->only('phone', 'password');
            Auth::attempt($credentials);
            return redirect('/');

        }
        elseif ($role == 'Instructor') {
            
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);

            return view('auth.instructor_verify',compact('user')); 
        }else{

            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return view('auth.company_verify',compact('user')); 

            
        }
    }
    	

    public function reg_step(){

    	$user = User::find(27);
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
        return view('auth.instructor_signup',compact('user','jobtitles','profiles'));

        // Company
        // return view('auth.company_signup',compact('user','jobtitles','profiles'));

    }

    public function process_instructor_reg(Request $request){

       
        $userid = $request->userid;
        $headline = $request->headline;
        $jobtitleid = $request->jobtitleid;
        $description = $request->description;
        $website = $request->website;
        $twitter = $request->twitter;
        $facebook = $request->facebook;
        $linkedin = $request->linkedin;
        $youtube = $request->youtube;
        $instagram = $request->instagram;
        $education = $request->education;
        $profile = $request->profile;

        $edu_array    = array($education);
        $json_str_edu = json_encode($edu_array);


        $user = User::find($userid);
        $user->jobtitle_id = $jobtitleid;
        $user->profile_photo_path = $profile;
       

        $user->save();

        $instructor = new Instructor();
        $instructor->headline = $headline;
        $instructor->bio = $description;
        $instructor->website = $website;
        $instructor->twitter = $twitter;
        $instructor->facebook = $facebook;
        $instructor->linkedin = $linkedin;
        $instructor->youtube = $youtube;
        $instructor->instagram = $instagram;
        $instructor->status = 1;
        $instructor->user_id = $user->id;
        $instructor->education = $json_str_edu;

        $instructor->save();
        



    }

    public function process_company_reg(Request $request){

        $userid = $request->userid;
        $companyname = $request->companyname;
        $jobtitleid = $request->jobtitleid;
        $profile = $request->profile;

        $address = $request->address;
        $description = $request->description;

        if($request->hasfile('companylogo')){
              $logo = $request->file('companylogo');
              $upload_dir = public_path().'/business/';
              $name = time().'.'.$logo->getClientOriginalExtension();
              $logo->move($upload_dir,$name);
              $path = '/business/'.$name;
        }else{
            $path = '';
        }

        $company = new Company();
        $company->name = $companyname;
        $company->logo = $path;
        $company->address = $address;
        $company->description = $description;
        $company->save();

        $user = User::find($userid);
        $user->company_id = $company->id;
        $user->jobtitle_id = $jobtitleid;
        $user->profile_photo_path = $profile;
        $user->save();
    }

    public function verify_user()
    {
        $verification_code = $_GET['code'];
        // dd($verification_code);
        $user = User::where('verification_code',$verification_code)->first();
        // dd($user);
        $user_role = $user->getRoleNames();

        if($user != null){
            $user->status = 2;
            $user->save();
          
        }
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
        
        if($user_role[0] == 'Instructor'){
            return view('auth.instructor_signup',compact('user','jobtitles','profiles')); 
        }else{
            return view('auth.company_signup',compact('user','jobtitles','profiles'));
        }
      

    }

}
