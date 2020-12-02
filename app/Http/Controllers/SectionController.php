<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Course;
use App\Models\Contenttype;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sections=Section::all();
        $contenttypes=Contenttype::all();
        return view('course.section_new',compact('sections','contenttypes'));
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
        $section->course_id=6;
        //$section->sorting=1;

        $testcourse=Section::whereNull('course_id')->get();
        //dd($testcourse);

        if($testcourse){
            $section->sorting=1;
        }else{
          $last_row=DB::table('sections')->orderBy('id', 'DESC')->first();
          //dd($last_row);
          $last_sorting=$last_row->sorting;
        //dd($last_sorting);
          $sortingnum=$last_sorting+1;
        //dd($sortingnum);
          $section->sorting=$sortingnum;
      }

       // $lastdata=Section::orderBy('created_at', 'desc')->first();

      $section->instructor_id=1;

      $section->save();

      return redirect()->route('backside.section.index');


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

        $section->sorting=1;
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
}
