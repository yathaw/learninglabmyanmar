<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Course;
use App\Models\Content;
use App\Models\Lesson;
use App\Models\Contenttype;
use App\Models\Instructor;
use App\Models\User;


use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {      
        $course = Course::find($id);
        $sections=Section::where('course_id',$id)
                    ->orderBy('sorting')->get();

        
        $contents=Content::all();
        // $contents=Content::paginate(8);

        $lesson=Lesson::find($id);

        $contenttypes=Contenttype::all();

        // if($course->id == $instructor->course_id){
        //     $instructors=Instructor::all();
        // }

        $instructors=Instructor::all();
        return view('course.section_new',compact('sections','contenttypes', 'course','contents','lesson','instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $contenttypes=Contenttype::all();
        return view('course.section_new',compact('contenttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            "title"=>"required|min:5",
            "objective"=>"required",
            "contenttype"=>"required"
        ]);

        $section=new Section;
        $section->title=$request->title;
        $section->objective=$request->objective;
        
        $section->contenttype_id=$request->contenttype;
        $section->course_id=$request->courseid;
        //$section->sorting=1;

        $hasCourses_inSection = Section::where('course_id', $request->courseid)->get();

        foreach($hasCourses_inSection as $hasCourse_inSection){
            $sorting = $hasCourse_inSection->sorting;
            $sorting_data = ++$sorting;
        }

        /*insert sorting*/
        if($hasCourses_inSection->isEmpty()){
        $section->sorting = 1;
        }else{
            $section->sorting = $sorting_data;
        }

        $authuser = Auth::user();
        $role = $authuser->getRoleNames();
        
            if($authuser->company_id == NULL && $role[0] == 'Instructor' ){ 
                $instructor = $authuser->instructor;
                $instructorid= $instructor->id; 
                $section->instructor_id=$instructorid;
            }else if($authuser->company_id == NULL && $role[0] == 'Admin'){
                $section->instructor_id=$request->instructor;
            }else{
                $section->instructor_id=$request->instructor;
            }

      $section->save();


      return redirect()->route('backside.sectionlist',$request->courseid);


  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {   
        //dd($section->id);
        // $contenttypes=Contenttype::all();
        // return view('course.section_new',compact('section','contenttypes'));
      return $section;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    { 
    


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('backside.section.index');
    }

    public function getid(Request $request){
        $id = $request->id;
        $section =Section::find($id);
        return $section;
    }

    public function getcontenttype(Request $request)
    {
        $id = $request->contenttypeid;
        //dd($id);
        $content_array=Contenttype::all();
        return $content_array;
    }

    public function getinstructor(Request $request)
    {
        $instructorid = $request->instructorid;
        $courseid=$request->courseid;
           
        // $instructors= DB::table('course_instructor')
        //                 ->where('course_id','=',$courseid)
        //                 ->get(); // id

        $instructors= DB::table('course_instructor')
                       ->where('course_id','=',$courseid)
                       ->join('instructors', 'instructors.id', '=', 'course_instructor.instructor_id')
                       ->join('users', 'users.id', '=', 'instructors.user_id')
                         ->get(); 

       return $instructors;
    }

    public function sectionsorting_modernize(Request $request){
        $id = $request->id;
        $sorting = $request->sorting;

        Section::where('id', $id)->update(array('sorting' => $sorting));
    }

}
