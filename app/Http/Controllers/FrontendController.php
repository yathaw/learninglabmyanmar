<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Instructor;
use App\Models\User;
use Auth;

class FrontendController extends Controller
{
    public function index(){
    	return view('frontend.index');
    }

    public function courses(){
    	return view('frontend.courses');
    }

    public function coursedetail($id){
    	return view('frontend.coursedetail');
    }

    public function addtocart(){
    	return view('frontend.addtocart');
    }

    public function instructors(){
    	return view('frontend.instructors');
    }

    public function instructordetail($id){
    	return view('frontend.instructordetail');
    }

    //honey
    public function business_info(){
        return view('business_info');

    }

    public function business_store(Request $request)
    {
               
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'logo' => 'required'
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
        
        $company = new Company();
        $company->name = request('company_name');
        $company->logo = $path;
        $company->address = request('address');
        $company->description = request('description');
        $company->save();

        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->company_id = $company->id;
        $user->save();

        return redirect()->route('frontend.index');


    }
 
    public function instructor_info(){
        return view('instructor_info');
    }

    public function instructor_store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'biography' => 'required',
            'website' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
        ]);
        $user_id = Auth::id();

        $instructor = new Instructor();
        $instructor->headline = request('headline');
        $instructor->bio = request('biography');
        $instructor->website = request('website');
        $instructor->twitter = request('twitter');
        $instructor->facebook = request('facebook');
        $instructor->linkedin = request('linkedin');
        $instructor->youtube = request('youtube');
        $instructor->instagram = request('instagram');
        $instructor->user_id = $user_id;
        $instructor->status = 0;
        $instructor->save();

        return redirect()->route('frontend.index');



    }
}
