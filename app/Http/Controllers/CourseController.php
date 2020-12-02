<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Level;
use App\Models\Instructor;

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
        $courses=Course::all();
        return view('course.index',compact('courses','categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $levels = Level::all();
        $instructors=Instructor::all();
      
        return view('course.create',compact('categories','subcategories','levels','instructors'));
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
        //dd($request->description);
        //dd($request->situations);
        //dd($request);

        
        
         $data[] = $request->situations;
         $data1[]=$request->requirements;

       

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

            $course =new Course;
            $course->title = $request->title;
            $course->subtitle=$request->subtitle;
            $course->subcategory_id=1;
            $course->level_id=$request->level;
            $course->instructor_id=1;
            $course->outline=$request->description;
            $course->requirements=json_encode($data);
            $course->situation=json_encode($data1);

            $course->status =0;
            $course->price=$request->pricing;
            $course->image=$path;
            $course->video=$path1;

           
            $course->save();

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit',compact('course'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
