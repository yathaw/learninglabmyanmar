<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Wishlist;
use Auth;
use App\Models\Sale;

class FrontendController extends Controller
{
    public function index(){
    	return view('frontend.index');
    }

    public function courses(){

        $wishlists = Wishlist::all();
        $courses = Course::paginate(8);
        $allcourses = Course::all();
        
    	return view('frontend.courses',compact('courses','allcourses','wishlists'));
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


    // nyl
    public function courses_search(Request $request)
    {
       $data = $request->data;


       $search_data = Course::where('title','like','%'.$data.'%')->with(array('instructors' => function($query)
       {
        $query->with('user');
       }))->with('wishlists')->get();


       // dd($search_data);
       return response(json_decode($search_data));
    }




    public function wishlist(Request $request)
    {
        $course_id = $request->id;
        $wishlists = Wishlist::withTrashed()->get();
        $user_id = Auth::id();
        $array = Array();

        
        
        foreach ($wishlists as $row) {

            if($course_id == $row->course_id && $user_id == $row->user_id){
                array_push($array, $row);
            }
        }


        if($array){
            foreach ($array as $row) {
                if($row->deleted_at){
                    $row->restore();

                }else{
                    
                    $row->delete();
                    return 'delete';
                }
            }
            
        }else{

            $wishlist = new Wishlist;
            $wishlist->course_id = $course_id;
            $wishlist->user_id = $user_id;
            $wishlist->save();
        }
        
        return "ok";

    }

    public function wishlist_search(Request $request)
    {
        $data = $request->data;


        $search_data = Course::where('title','like','%'.$data.'%')->with(array('instructors' => function($query)
           {
            $query->with('user');
           }))->with('wishlists')->get();

  
       return response(json_decode($search_data));     
    }


    public function removewishlist(Request $request)
    {
        $course_id = $request->id;
        $user_id = Auth::id();
        $wishlists = Wishlist::all();
        foreach ($wishlists as $row) {

            if($course_id == $row->course_id && $user_id == $row->user_id){
                $row->delete();
            }
        }
  
       return "ok";   
    }


    public function course_sale(Request $request)
    {
       $user_id = Auth::id();  
       $data = $request->data;
       $array = Array();
       $total = 0;
       $invoice = rand(1000000,100);
       foreach ($data as $value) {

           if($user_id == $value['user_id']){
            $total += $value['price'];
            array_push($array, "true");
           }
       }
       if($array){

        $sale = new Sale();
        $sale->invoiceno = "Stu-".$invoice;
        $sale->total = $total;
        $sale->user_id = $user_id;
        // $sale->save();
        

       }

       foreach ($data as $value) {

           if($user_id == $value['user_id']){
            // $sale->courses()->attach($value['id']);
           }
       }

       return response(json_decode($user_id));
   }
       
    //honey
    public function business_info(){
        return view('business_info');

    }

    public function instructor_info(){
        return view('instructor_info');
    }
}
