<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Instructor;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        // dd($companies);
        return view('business.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
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
            'company_name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'logo' => 'required',
            
        ]);

        if($request->hasfile('logo')){
              $logo = $request->file('logo');
              $upload_dir = public_path().'/business/';
              $name = time().'.'.$logo->getClientOriginalExtension();
              $logo->move($upload_dir,$name);
              $path = '/business/'.$name;
        }else{
            $path = '';
        }

        if($request->hasfile('profile')){
              $profile = $request->file('profile');
              $upload_dir = public_path().'/profiles/';
              $profile_name = time().'.'.$profile->getClientOriginalExtension();
              $profile->move($upload_dir,$profile_name);
              $profile_path = '/profiles/'.$profile_name;
        }else{
            $profile_path = '';
        }
        
        $company = new Company();
        $company->name = request('company_name');
        $company->logo = $path;
        $company->address = request('address');
        $company->description = request('description');
        $company->save();

       
        $user = new User();
        $user->name = request('user_name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        $user->profile_photo_path = $profile_path;
        $user->company_id = $company->id;
        $user->save();

        $user->assignRole('Business');
        return redirect()->route('backside.companies.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company_id = $company->id;
        
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
                # code...
            }
           
        }

        return redirect()->route('backside.companies.index');

    }

    public function instructor_list($id)
    {
        $user = User::find($id);
        $company_id = $user->company_id;

        $user_instructors = User::where([['company_id',$company_id],['status',0]])->get();
        
        return view('business.instructor_list',compact('user_instructors'));
    }

    public function remove_instructor($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        $courses = Course::where('user_id',$id)->get();
        foreach ($courses as $course) {
            $course->status=2;
            $course->save();
        }

        $instructor =Instructor::where('user_id',$id)->first();
        $instructor->delete();
        return back();
    }

    public function student_list($id)
    {
        // dd($id);
        $company_user = User::find($id);
        
        $company_id = $company_user->company_id;
        // dd($company_id);
        $users = User::where('company_id',$company_id)->get();
        return view('business.student_list',compact('users'));
    }
}
