<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Company;
use Auth;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructors.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            'confirm_password' => 'required',
            'headline' => 'required',
            'biography' => 'required',
            'website' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
        ]);

        if($request->hasfile('profile')){
              $profile = $request->file('profile');
              $upload_dir = public_path().'/profiles/';
              $profile_name = time().'.'.$profile->getClientOriginalExtension();
              $profile->move($upload_dir,$profile_name);
              $profile_path = '/profiles/'.$profile_name;
        }else{
            $profile_path = '';
        }

        $user = new User();
        $user->name = request('user_name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        $user->profile_photo_path = $profile_path;
        $user->save();

        $user->assignRole('Instructor');

        $instructor = new Instructor();
        $instructor->headline = request('headline');
        $instructor->bio = request('biography');
        $instructor->website = request('website');
        $instructor->twitter = request('twitter');
        $instructor->facebook = request('facebook');
        $instructor->linkedin = request('linkedin');
        $instructor->youtube = request('youtube');
        $instructor->instagram = request('instagram');
        $instructor->status = 1;
        $instructor->user_id = $user->id;
        $instructor->save();

        return redirect()->route('backside.instructors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        // dd($instructor);
        $user_id = $instructor->user_id;
        // dd($user_id);

        $user = User::find($user_id);
        $user->status = 1;
        $user->save();

        $instructor_id = $instructor->id;
        $courses = Course::where('user_id',$user_id)->get();

        foreach ($courses as $course) {
            $course->status = 2;
            $course->save();
            # code...
        }

        $instructor->delete();

        return redirect()->route('backside.instructors.index');


    }

    public function account_remove()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        
        $user_role_name = $user->getRoleNames();
       
        if($user_role_name[0] == "Instructor"){
            $user->status = 1;
            $user->save();
            $instructor = Instructor::where('user_id',$id)->first();
           
            $instructor->delete();

            $courses = Course::where('user_id',$id)->get();
           
            foreach ($courses as $course) {
                $course->status = 2;
                $course->save();
            }
        }
        if($user_role_name[0] == "Business")
        {
           
            $company_id = $user->company_id;
            $company = Company::find($company_id);
            $company->delete();

            $users = User::where('company_id',$company_id)->get();

            foreach($users as $user){
                $user->status = 1;
                $user->save();

                $user_role_name = $user->getRoleNames();
                if($user_role_name[0] == 'Instructor')
                {
                    $instructor = Instructor::where('user_id',$user->id)->first();
                    $instructor->delete();
                    
                }
                if($user_role_name[0] == 'Business')
                {
                    $company->delete();
                }

                $courses = Course::where('user_id',$user->id)->get();
                foreach ($courses as $course) {

                    $course->status = 2;
                    $course->save();
                  
                }
               
            }
        }
       
        

        return 'confirm';

    } 

    public function instructor_studentlist($id)
    {
      
      $user = User::find($id);
      $user_courses = $user->courses;
      
      return view ('instructors.student_list',compact('user_courses'));
    }

    public function confirm_remove()
    {
      return view('instructors.confirm');
    }
}
