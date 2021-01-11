<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Content;
use App\Models\Lesson;

class BackendController extends Controller
{
    public function sectionupdate(Request $request,$id){
    	//dd($request);
    	$sectionid = $request->sectionid;
        $courseid = $request->courseid;
        $title = $request->title;
        $objective = $request->objective;
        // $instructorid = $request->instructorid;
        // $contenttypeid=$request->contenttypeid;
        $section=Section::find($id);
        $section->title=$title;
        $section->objective=$objective;
        
        $section->contenttype_id=$request->contenttype;
        $section->course_id=$courseid;
        $section->instructor_id=$request->instructor;

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

    public function contentdelete($id){
        $content=Content::find($id);

        $lesson=Lesson::where('content_id',$content)->get();

        $content->delete();

        $lesson->delete();

        return $content;
    }

    public function contentupdate(Request $request,$id){
        dd($request);
        $contentid = $request->contentid; 
        $sectionid = $request->content_sectionid;
        
        $content=Content::find($id);
        $content->title=$request->content_title;
        $content->description=$request->content_description;
        $content->contenttype_id=$request->contenttypeid;
        $content->sorting=1;
        $content->save();


        if($request->hasfile('file')){

        $track = new GetId3(request()->file('file'));
        //get all info
        $track->extractInfo();
        //get title
        $track->getTitle();
        //get playtime
        $duration_time=$track->getPlaytime();
        $duration_sec=$track->getPlaytimeSeconds();
        //dd($duration_sec);
        $file = $request->file;
            $fileName=time().'_'.$request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('lesson', $fileName, 'public');
            $filepath='/storage/'.$path;
            $fileExtension =$file->extension();

            }
            else{
                $filepath = 'NULL';
                $fileExtension = 'NULL';
                $duration_sec = 'NULL';

                $filepath=$request->hidden_file;

            }

            if($request->hasfile('file_upload')){
            $fileName1=time().'_'.$request->file_upload->getClientOriginalName();
            $path1 = $request->file('file_upload')->storeAs('lessonfile', $fileName1, 'public');
            $filepath1='/storage/'.$path1;
            }else{
                $filepath1=$request->file_upload;
            }

            $lesson=Lesson::find($id);
            
            $lesson->content_id=$request->contentid;

            $lesson->file=$filepath;
            $file = $request->file;
            $fileExtension =$fileExtension;
            //dd($fileExtension);
            $lesson->type=$fileExtension;
            $lesson->duration= $duration_sec;

            $lesson->file_upload=$filepath1;
            $lesson->save();

      return $content;
  }

    
}
