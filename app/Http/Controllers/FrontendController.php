<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class FrontendController extends Controller
{
    public function index(){
    	return view('frontend.index');
    }

    public function courses(){

        $courses = Course::paginate(8);
        $allcourses = Course::all();
        
    	return view('frontend.courses',compact('courses','allcourses'));
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

    public function courses_search(Request $request)
    {
       $data = $request->data;


       $search_data = Course::where('title','like','%'.$data.'%')->with(array('instructor' => function($query)
       {
        $query->with('user');
       }))->get();


       // dd($search_data);
       return response(json_decode($search_data));
    }
}
