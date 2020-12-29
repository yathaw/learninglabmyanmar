<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Assignment;

use Owenoj\LaravelGetId3\GetId3;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contents=Content::all();
        // $lessons=Lesson::all();
        return view('course.section_new');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create');
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
        // $request->validate([
        //     "title"=>"required|min:5",
        //     "description"=>"required",
        //     "contenttype"=>"required",
        // ]);

        $content=new Content;
        $content->title=$request->content_title;
        $content->description=$request->content_description;

        $content->section_id=$request->sectionid;
        $content->sorting=1;

        // $hasCourses_inSection = Section::where('course_id', $request->courseid)->get();

        // foreach($hasCourses_inSection as $hasCourse_inSection){
        //     $sorting = $hasCourse_inSection->sorting;
        //     $sorting_data = ++$sorting;
        // }

        // /*insert sorting*/
        // if($hasCourses_inSection->isEmpty()){
        // $section->sorting = 1;
        // }else{
        //     $section->sorting = $sorting_data;
        // }


       //$section->instructor_id=1;
        $content->contenttype_id=$request->contenttypeid;
        $content->save();

        if($content->contenttype_id == 1 || $content->contenttype_id == 3){
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

            $fileName=time().'_'.$request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('lesson', $fileName, 'public');
            $filepath='/storage/'.$path;
            $fileExtension =$file->extension();

            }
            else{
                $filepath = 'NULL';
                $fileExtension = 'NULL';
                $duration_sec = 'NULL';

            }

            if($request->hasfile('file_upload')){
            $fileName1=time().'_'.$request->file_upload->getClientOriginalName();
            $path1 = $request->file('file_upload')->storeAs('lessonfile', $fileName1, 'public');
            $filepath1='/storage/'.$path1;
            }

            $lesson=new Lesson;
            
            $lesson->content_id=$content->id;

            $lesson->file=$filepath;
            $file = $request->file;
            $fileExtension =$fileExtension;
            //dd($fileExtension);
            $lesson->type=$fileExtension;
            $lesson->duration= $duration_sec;

            $lesson->file_upload=$filepath1;
            $lesson->save();

     

       //return redirect()->route('backside.sectionlist');
        // }else if($content->contenttype_id == 3){

        //     if($request->file()){
        //     $fileName=time().'_'.$request->file->getClientOriginalName();
        //     $path = $request->file('file')->storeAs('assignment', $fileName, 'public');
        //     $filepath='/storage/'.$path;
        //     }

        //     $assignment=new Assignment;
        //     $assignment->file=$filepath;

        //     $file = $request->file;
        //     $fileExtension =$file->extension();
        //     //dd($fileExtension);
        //     $assignment->type=$fileExtension;

        //     $assignment->content_id=$content->id;
        //     $assignment->save();

        }
       return redirect()->route('backside.section.index');
      // return view('course.section_new');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('content.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()->route('backside.section.index');
    }

    public function getsectionid(Request $request){
        
        $id = $request->id;
        $section =Section::find($id);
        return $section;

    }

    public function getcontentid(Request $request){
        
        $id = $request->id;
        $content =Content::find($id);
        return $content;

    }

    public function getlesson(Request $request){
        
        $contentid = $request->contentid;
        $lesson =Lesson::where('content_id',$contentid)->get();
        return $lesson;

    }
}
