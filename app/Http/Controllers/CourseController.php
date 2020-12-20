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
        $allcourses = Course::all();

        if ($role[0] == 'Instructor') {
            $instructor = $authuser->instructor;
            $instructorid = $instructor->id;

            $courses = Course::whereHas('instructors', function($q) use ($instructorid)
            {
                $q->where('instructor_id', '=', $instructorid);
                
            })->paginate(8);

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
        }
        else{
            
            $courses=Course::orderBy('status')->paginate(8);
            

        }

        return view('course.index',compact('courses','categories','subcategories','auth_id','role','allcourses'));
        
         
        
        
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
            $course->price=$request->pricing;
            $course->image=$path;
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
            $path=$request->oldphoto;
        }
        //dd($path);



        if ($request->file()) {

            //78748785858_bella.jpg
            $fileName1 = time().'_'.$request->video->getClientOriginalName();
            //categoryimg/78748785858_bella.jpg
            $filepath1 =$request->file('video')->storeAs('coursevideo',$fileName1,'public');
            $path1 ='/storage/'.$filepath1;
        }else{
            $path1=$request->oldvideo;
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
        $course= Course::find($id);
        $course->status =1;
        $course->save();
        return back();
    }

    public function courses_search(Request $request)
    {
       $data = $request->data;


       $search_data = Course::where('title','like','%'.$data.'%')->with(array('instructors' => function($query)
       {
        $query->with('user');
       }))->get();


       // dd($search_data);
       return response(json_decode($search_data));
    }
}
