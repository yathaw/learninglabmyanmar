<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
        //
    }
}
