<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
    	return view('frontend.index',compact('categories','subcategories'));
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
}
