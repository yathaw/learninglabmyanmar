<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Course;
use App\Models\Content;
use App\Models\Lesson;
use App\Models\Contenttype;
use App\Models\Instructor;
use Auth;

use Illuminate\Http\Request;

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
        $sections=Section::orderBy('sorting')->get();
        
        $contents=Content::all();
        $lesson=Lesson::find($id);

        $contenttypes=Contenttype::all();

        // if($course->id == $instructor->course_id){
        //     $instructors=Instructor::all();
        // }

        $instructors=Instructor::all();
        //$instructors=
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
        /*insert sorting*/

        // if(Auth::user->company_id == null){

            $auth_id = Auth::id();

            $user = Auth::user();
            $role = $user->getRoleNames();

            if ($role[0] == 'Instructor') {
                $instructor = Instructor::where('user_id',$user->id)->first();

                //dd($instructor->id);
        }

        //  $section->instructor_id=$instructor;
        // }else{
            
        //     if($course->id == $instructor->course_id){
        //         $instructors=Instructor::all();
        //     }
           
        //     $section->instructor_id=$instructors;
        // }

       

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
        $contenttypes=Contenttype::all();
        return view('course.section_new',compact('section','contenttypes'));
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
        $request->validate([
            "title"=>"required|min:5",
            "objective"=>"required",
            "contenttype"=>"sometimes"
        ]);

        $section->title=$request->title;
        $section->objective=$request->objective;
        
        $section->contenttype_id=$request->contenttype;
        $section->course_id=6;

        $section->sorting=$section->sorting;
        $courseid=Section::whereNotNull('course_id')->get();
        //dd($courseid);

        if($courseid){
            //$latestitems = Item::latest()->take(3)->get();

            $sortingnum=Section::increment('sorting',1);
            $section->sorting=$sortingnum;
        }else{
           $section->sorting=1;
       }



       $section->instructor_id=1;

       $section->save();

       return redirect()->route('backside.section.index');

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

    public function sectionsorting_modernize(Request $request){
        $id = $request->id;
        $sorting = $request->sorting;

        Section::where('id', $id)->update(array('sorting' => $sorting));

    }
}
