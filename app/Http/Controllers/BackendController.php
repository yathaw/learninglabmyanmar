<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Content;
use App\Models\Lesson;
use Owenoj\LaravelGetId3\GetId3;

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
        //dd($request->fileupload);
        $contentid = $request->contentid; 
        $sectionid = $request->content_sectionid;
        
        $content=Content::find($id);
        $content->title=$request->title;
        $content->description=$request->objective;
        $content->contenttype_id=$request->contenttypeid;
        $content->sorting=1;
        $content->save();

        if($content->contenttype_id == 1 || $content->contenttype_id == 3){
        if($request->videofile != 'undefined'){

        $track = new GetId3(request()->file('videofile'));

        //get all info
        $track->extractInfo();
        //get title
        $track->getTitle();
        //get playtime
        $duration_time=$track->getPlaytime();
        $duration_sec=$track->getPlaytimeSeconds();
        //dd($duration_sec);
        $file = $request->file('videofile');
            $fileName=time().'_'.$request->file('videofile')->getClientOriginalName();
            $path = $request->file('videofile')->storeAs('lesson', $fileName, 'public');
            $filepath='/storage/'.$path;
            $fileExtension =$file->extension();

            }
            else{
                $filepath = 'NULL';
                $fileExtension = 'NULL';
                $duration_sec = 'NULL';

                $filepath=$request->hidden_file;

            }

            if($request->fileupload != 'undefined'){
              //  dd($request->file('fileupload')->getClientOriginalName());
            $fileName1=time().'_'.$request->file('fileupload')->getClientOriginalName();
            $path1 = $request->file('fileupload')->storeAs('lessonfile', $fileName1, 'public');
            $filepath1='/storage/'.$path1;
            }else{
                $filepath1=$request->hidden_uploadfile;
            }

            $lesson=Lesson::where('content_id',$id)->get();
            
            $lesson[0]->content_id=$request->contentid;

            $lesson[0]->file=$filepath;
            $file = $request->file;
            $fileExtension =$fileExtension;
            //dd($fileExtension);
            $lesson[0]->type=$fileExtension;
            $lesson[0]->duration= $duration_sec;

            $lesson[0]->file_upload=$filepath1;
            $lesson[0]->save();
        }
      return $content;
  }

    
}
