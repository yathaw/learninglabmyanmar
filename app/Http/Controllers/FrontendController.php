<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function instructor_info(){
        return view('instructor_info');
    }
}
