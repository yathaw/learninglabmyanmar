<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Level;
use App\Models\Instructor;
use App\Models\User;
use App\Models\Section;
use App\Models\Company;


use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        

        $authuser = Auth::user();
        $auth_id = Auth::id();
        $role = $authuser->getRoleNames();
        

        if ($role[0] == 'Instructor') {
            $instructor = $authuser->instructor;
            $instructorid = $instructor->id;

            $courses = Course::whereHas('instructors', function($q) use ($instructorid)
            {
                $q->where('instructor_id', '=', $instructorid);
                
            })->paginate(8);

            $allcourses = Course::whereHas('instructors', function($q) use ($instructorid)
            { $q->where('instructor_id', '=', $instructorid);})->count();


            return view('course.index',compact('courses','categories','subcategories','auth_id','role','allcourses'));

        }
        elseif ($role[0] == 'Business') {
            $companyid = $authuser->company_id;
            $instructors = User::where('company_id', $companyid)->get();

            $courses = Course::whereHas('instructors', function($q) use ($companyid)
            {
                $q->whereHas('user', function($q1) use ($companyid)
                {
                    $q1->where('company_id', '=', $companyid);
                });
            })->paginate(8);

            $allcourses = Course::whereHas('instructors', function($q) use ($companyid)
            {
                $q->whereHas('user', function($q1) use ($companyid)
                {
                    $q1->where('company_id', '=', $companyid);
                });
            })->count();
        }
        else{
            
            $requested_courses=Course::where('status',2)->get();
            $confirmed_courses=Course::where('status',1)->get();
            $courses = Course::orderBy('status')->paginate(8);

            $allcourses = Course::orderBy('status')->count();
            

        }

        return view('course.index',compact('courses','requested_courses','confirmed_courses','categories','subcategories','auth_id','role','allcourses'));
        
         
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $authuser = Auth::user();
        $role = $authuser->getRoleNames();

        if ($role[0] == 'Admin') {
            $companies = Company::all();
        }

        else{
            $companies = NULL;
        }


        if($role[0] == 'Business') {
            $companyid = $authuser->company_id;

            $instructors = User::whereHas('company', function($q) use ($companyid)
            {
                $q->where('company_id', '=', $companyid);
            })
            ->role('Instructor')
            ->get();
        }else{
            $instructors = NULL;
        }

        // dd($instructors);
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $levels = Level::all();





      
        return view('course.create',compact('categories','subcategories','levels','instructors','users','authuser','companies'));
    }

    public function getinstructor(Request $request){
        $companyid = $request->id;

        // $instructors = User::where('company_id',$companyid)->get();

        $instructors = User::whereHas('company', function($q) use ($companyid)
            {
                $q->where('company_id', '=', $companyid);
            })
            ->role('Instructor')
            ->with('instructor')
            ->get();

        return $instructors;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->descriptionId.getContents());
        // dd($request->descriptionId.getText()) ;


        // dd($request->acceptTerms);

        //if the file include, please upload (eg:input type="file")
        if ($request->file()) {


            //78748785858_bella.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            //categoryimg/78748785858_bella.jpg
            $filepath =$request->file('photo')->storeAs('courseimg',$fileName,'public');
            $path ='/storage/'.$filepath;
        }
        //dd($path);

        if ($request->file()) {

            //78748785858_bella.jpg
            $fileName2 = time().'_'.$request->sign->getClientOriginalName();
            //categoryimg/78748785858_bella.jpg
            $filepath2 =$request->file('sign')->storeAs('signature',$fileName2,'public');
            $path2 ='/storage/'.$filepath2;
        }

        if ($request->file()) {

            //78748785858_bella.jpg
            $fileName1 = time().'_'.$request->video->getClientOriginalName();
            //categoryimg/78748785858_bella.jpg
            $filepath1 =$request->file('video')->storeAs('coursevideo',$fileName1,'public');
            $path1 ='/storage/'.$filepath1;
        }

        


            $auth_id = Auth::id();

            $user = Auth::user();
            $role = $user->getRoleNames();

        $acceptTerms = $request->acceptTerms;

        if ($acceptTerms) {
            $certificate = $acceptTerms;
        }
        else{
            $certificate = "off";
        }

            $course =new Course;
            $course->title = $request->title;
            $course->subtitle=$request->subtitle;
            $course->subcategory_id=$request->subcategoryid;
            $course->level_id=$request->level;
            $course->description = $request->description;
            $course->outline=json_encode($request->situations);
            $course->requirements=json_encode($request->requirements);
            $course->certificate = $certificate;
            $course->share = 0;
            $course->status =0;
            $course->chairman=$request->chairman;
            $course->price=$request->pricing;
            $course->image=$path;
            $course->signature=$path2;
            $course->video=$path1;
            $course->user_id = $auth_id;
           
            $course->save();


            

            if ($role[0] == 'Instructor') {
                $instructor = Instructor::where('user_id',$user->id)->first();

                //dd($instructor->id);
            }else{
                $instructor = request('teachers');

            }

            $course->instructors()->attach($instructor);

            return redirect()->route('backside.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        $sections = Section::where('course_id',$course->id)->orderByRaw("CAST(sorting as Integer) ASC")->get();

        return view('course.show',compact('course','sections'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $authuser = Auth::user();
        $role = $authuser->getRoleNames();

        if ($course->instructors[0]->user->company_id) {
            $companyid = $course->instructors[0]->user->company_id;

            $company = Company::find($companyid);
        }else{
            $company = NULL;
        }

        if($company) {
            $companyid = $course->instructors[0]->user->company_id;

            $instructors = User::whereHas('company', function($q) use ($companyid)
            {
                $q->where('company_id', '=', $companyid);
            })
            ->role('Instructor')
            ->get();
        }else{
            $instructors = NULL;
        }



        $categories=Category::all();
        $subcategories=Subcategory::all();
        $levels = Level::all();



        // $instructors=Instructor::all();
      
        return view('course.edit',compact('course','categories','subcategories','levels','company', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
          //dd($request->oldphoto);

          //dd($request->oldvideo);


        //if the file include, please upload (eg:input type="file")
        if ($request->file()) {


            //78748785858_bella.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            //categoryimg/78748785858_bella.jpg
            $filepath =$request->file('photo')->storeAs('courseimg',$fileName,'public');
            $path ='/storage/'.$filepath;
        }else{
            $path = $request->oldphoto;
        }
        //dd($path);
        if ($request->file()) {

            //78748785858_bella.jpg
            $fileName2 = time().'_'.$request->sign->getClientOriginalName();
            //categoryimg/78748785858_bella.jpg
            $filepath2 =$request->file('sign')->storeAs('signature',$fileName2,'public');
            $path2 ='/storage/'.$filepath2;
        }else{
            $path2 = $request->oldsignature;
        }



        if ($request->file()) {

            //78748785858_bella.jpg
            $fileName1 = time().'_'.$request->video->getClientOriginalName();
            //categoryimg/78748785858_bella.jpg
            $filepath1 =$request->file('video')->storeAs('coursevideo',$fileName1,'public');
            $path1 ='/storage/'.$filepath1;
        }else{
            $path1 = $request->oldvideo;
        }
            $auth_id = Auth::id();

            $user = Auth::user();
            $role = $user->getRoleNames();

            $acceptTerms = $request->acceptTerms;

            if ($acceptTerms) {
                $certificate = $acceptTerms;
            }
            else{
                $certificate = "off";
            }
         
            $course->title = $request->title;
            $course->subtitle=$request->subtitle;
            $course->subcategory_id=$request->subcategoryid;
            $course->level_id=$request->level;
            $course->description = $request->description;
            $course->outline=json_encode($request->situations);
            $course->requirements=json_encode($request->requirements);
            $course->certificate = $certificate;
            $course->price=$request->pricing;
            $course->image=$path;
            $course->video=$path1;

            $course->user_id = $auth_id;
           
            $course->save();

            // detach to pivot
            $course->instructors()->detach();
           

            if ($role[0] == 'Instructor') {
                $instructor = Instructor::where('user_id',$user->id)->first();

                //dd($instructor->id);
            }else{
                $instructor = request('teachers');

            }

            $course->instructors()->attach($instructor);

            return redirect()->route('backside.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
         $course->delete();
         return redirect()->route('backside.course.index');
    }

    public function approve($id)
    {
        //dd($id);
        $course= Course::find($id);
        $course->status =1;
        $course->save();
        return redirect()->route('backside.course.index');
    }

    public function sendapprove($id)
    {
        $course= Course::find($id);
        $course->status =2;
        $course->save();
        return redirect()->route('backside.course.index');
    }

    public function givefeedback($id)
    {
        //dd($id);
        $course= Course::find($id);
        
        return view('course.feedback',compact('course'));
    }

    public function comment(Request $request)
    {
        //dd($request->id);
       
        $comment = $request->comment;
        $courseid = $request->id;
        $course = Course::find($courseid);
        $course->approvefeedback = $comment;
        $course->status = 3;
        $course->save();
      
        

        return response()
            ->json(['msg' => 'success']);
    }

    public function course_search(Request $request)
    {
       $data = $request->search_data;

       if($data != null){
           $search_data = Course::where('title','like','%'.$data.'%')->with(array('instructors' => function($query)
           {
            $query->with('user','user.company')->join('users','users.id','=','instructors.user_id')->where('users.id',Auth::id());
           }))->with('contents','user','contents.lessons')->where('courses.user_id',Auth::id())->get();

           return response(json_decode($search_data));
       }else{

       }
    }
}
