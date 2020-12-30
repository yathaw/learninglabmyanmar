<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Wishlist;
use Auth;
use App\Models\Sale;
use App\Models\Section;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Company;
use App\Models\Instructor;
use App\Models\User;
use App\Models\Jobtitle;

use App\Events\CheckoutEvent;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CheckoutNotification;
use Illuminate\Support\Facades\Hash;
class FrontendController extends Controller
{
    public function index(){
        $limitcategories = Category::all()->random(3);
        $newest_courses = Course::orderBy('created_at', 'DESC')->take(6)->get();
        $top_courses = Course::all()->random(6); // rating ပေါ်မူတည်ပြီး တွက်မယ် လောလောဆယ် random ပဲ
        $wishlists = Wishlist::all();


        // dd($top_courses);
    	return view('frontend.index',compact('limitcategories','newest_courses', 'top_courses', 'wishlists'));
    }

    public function courses(){

        $wishlists = Wishlist::all();
        $courses = Course::where('status',1)->paginate(8);
        $allcourses = Course::all();
        
    	return view('frontend.courses',compact('courses','allcourses','wishlists'));
    }

    public function coursebyCategory($categoryid){
      
      $courses = Course::whereHas('subcategory', function($q) use ($categoryid)
      {
          $q->where('category_id', $categoryid);
          
      })->paginate(8);

      $category = Category::find($categoryid);


      return view('frontend.coursesbycategory',compact('courses','category'));

      
    }

    public function coursebySubcategory($subcategoryid){
      $courses = Course::where('subcategory_id',$subcategoryid)->paginate(8);
      $allcourses = Course::where('subcategory_id',$subcategoryid)->get();
      $wishlists = Wishlist::all();


      $subcategory = Subcategory::find($subcategoryid);

      return view('frontend.coursesbysubcategory',compact('courses','subcategory','allcourses','wishlists'));
    }

    public function coursedetail($id){
        $course = Course::find($id);
        $sections = Section::where('course_id',$id)->orderByRaw("CAST(sorting as Integer) ASC")->get();
        $wishlists = Wishlist::where('user_id',Auth::id())->get();

    	  return view('frontend.coursedetail',compact('course','wishlists','sections'));
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
       }))->with('wishlists')->with(array('sales'=>function($q)
       {
        $q->where('user_id',Auth::id())->get();
       }))->get();
       //dd($search_data);
       return response(json_decode($search_data));
    }

    public function searchcourse_bysubcategoryid(Request $request){
      $subcategoryid = $request->subcategoryid;

        $data = $request->data;


       $search_data = Course::where('title','like','%'.$data.'%')
                      ->where('subcategory_id',$subcategoryid)
                      ->with(array('instructors' => function($query)
       {
        $query->with('user');
       }))->with('wishlists')->with(array('sales'=>function($q)
       {
        $q->where('user_id',Auth::id())->get();
       }))->get();

       return response(json_decode($search_data));
       

    }


    public function wishlist_save(Request $request)
    {
        // dd($request);
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


        $search_data = Course::where('title','like','%'.$data.'%')->with(array('sales'=>function($q){
            $q->where('user_id',Auth::id())->get();
          }))->with(array('instructors' => function($query)
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
       $status = 0;
       $invoice = rand(1000000,100);
       $status=0;
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
        $sale->status = $status;
        $sale->save();
        

       }

       foreach ($data as $value) {

           if($user_id == $value['user_id']){
            $sale->courses()->attach($value['id'],['status'=>$status]);
           }
       }

        $checkoutnoti = [
                'saleid' => $sale->id,
                'invoiceno' => "Stu-".$invoice,
                'total' =>$total,
                'user_id' => $user_id
            ];

        Notification::send($sale,new CheckoutNotification($checkoutnoti));
        event(new CheckoutEvent($sale));

       return response(json_decode($user_id));
   }

   
   public function searchmystudying(Request $request)
   {
       $data = $request->data;

       $sales = Sale::where('user_id',Auth::id())->get();

       $sale_courses = Array();
       $courses = Array();
      
      // loop when auth user = sale user_id

       foreach ($sales as $sale) {
            
          foreach ($sale->courses as $course) {

            // when course_sale status is 1, set data to array

            if($course->pivot->status == 1){
              array_push($sale_courses, $course);
            } 
          }
       }


       // loop course_sale status 1 data

       foreach($sale_courses as $sale_course){

          $search_course = Course::where('id',$sale_course->id)->where('title','like','%'.$data.'%')->with(array('instructors'=>function($q){
              $q->with('user');
            }))->with(array('sales'=>function($q){
            $q->where('user_id',Auth::id())->get();
          }))->get();
            array_push($courses, $search_course);
          }

       // dd($courses);
       
       return response(json_encode($courses));
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


    public function profile($id)
    {
      $user = User::find($id);

      return view('frontend.profileupdate',compact('user'));
    }

    public function profileupdate(Request $request,$id)
    {
      $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'photo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:100000'
        ]);

      if($request->hasfile('photo')){
              $photo = $request->file('photo');
              $upload_dir = public_path().'/userprofile/';
              $name = time().'.'.$photo->getClientOriginalExtension();
              $photo->move($upload_dir,$name);
              $path = '/userprofile/'.$name;
        }else{
            $path = '';
        }

      $user = User::find($id);
      $user->name = request('name');
      $user->email = request('email');
      $user->phone = request('phone');
      $user->profile_photo_path = $path;
      $user->save();

      return redirect()->back();
    }


    public function instructorprofile($id)
    {
      $user = User::find($id);
      return view('auth.instructorprofileinfo',compact('user'));
    }

    public function instructorprofileedit($id)
    {
      $user = User::find($id);
      $jobtitles = Jobtitle::all();
      return view('auth.instructorprofileupdate',compact('user','jobtitles'));
    }

    public function instructorprofileupdate(Request $request,$id)
    {
      $request->validate([
            'name' => 'required',
            'newphoto' => 'sometimes|mimes:jpeg,jpg,png,gif|max:100000',
            'email'=>'required',
            'phone' => 'required',
            'headline' => 'required',
            'bio' => 'required',
            'jobtitleid'=>'required',
            'website' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
        ]);
        $user = User::find($id);

        if($request->hasfile('newphoto')){
              $newphoto = $request->file('newphoto');
              $upload_dir = public_path().'/userprofile/';
              $name = time().'.'.$newphoto->getClientOriginalExtension();
              $newphoto->move($upload_dir,$name);
              $path = '/userprofile/'.$name;
        }else{
            $path = request('oldphoto');
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->phone  = request('phone');
        $user->profile_photo_path = $path;
        $user->jobtitle_id = request('jobtitleid');
        $user->save();

        $instructor = Instructor::where('user_id',$id)->first();
        $instructor->headline = request('headline');
        $instructor->bio = request('bio');
        $instructor->website = request('website');
        $instructor->twitter = request('twitter');
        $instructor->facebook = request('facebook');
        $instructor->linkedin = request('linkedin');
        $instructor->youtube = request('youtube');
        $instructor->instagram = request('instagram');
        $instructor->user_id = $user->id;
        $instructor->status = 0;
        $instructor->save();
     
        return redirect()->route('instructorprofile',$id);
    }

    public function instructorchangepassword($id,Request $request)
    {
      $password = Hash::make($request->password);

      $user = User::find($id);
      $user->password = $password;
      $user->save();

      return redirect()->route('instructorprofile',$id);

    }

    public function changepassword($id)
    {
      $user = User::find($id);
      return view('auth.changepassword',compact('user'));
    }

    public function updatepassword(Request $request,$id)
  {
    // dd($request);
    $request->validate([
      'email' => 'required',
      'changepassword' => 'required|confirmed|min:5',
      'changepassword_confirmation' => 'required'
    ]);
    $email = $request->email;
    $changepassword = $request->changepassword;
    $confirmpassword = $request->changepassword_confirmation;
    $currentpassword = $request->currentpassword;

    $user = User::find($id);

    if(Hash::check($changepassword,$user->password)){
      
      return back()->with('msg','You current password are same match in our record.
        And New Password Change');
        
    }else{
     $user->password = Hash::make($changepassword);
      $user->email = $email;
      $user->save();

      return redirect()->route('login')->with('success','Successfully change Password!');
      
    }

  }
}
