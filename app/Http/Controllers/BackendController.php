<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class BackendController extends Controller
{
    public function sectionupdate(Request $request,$id){
    	//dd($request);
    	$sectionid = $request->sectionid;
        $courseid = $request->courseid;

        $instructorid = $request->instructorid;
        
        $title = $request->title;
        $objective = $request->objective;
        $contenttypeid=$request->contenttypeid;
        $section=Section::find($id);
        $section->title=$title;
        $section->objective=$objective;
        
        $section->contenttype_id=$contenttypeid;
        $section->course_id=$courseid;
        $section->instructor_id=$instructorid;

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

      $section->save();

      return $section;

    }
}
