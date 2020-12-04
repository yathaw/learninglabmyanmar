<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\Assignment;

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

        // $contentsorting= Content::where('section_id', $request->sectionid)->get();
        // //dd($contentsorting);

        // foreach($contentsorting as $contentsorting){
        //     $sorting = $contentsorting->sorting;
        //     $sorting_data = ++$sorting;
        // }

        // /*insert sorting*/
        // if($contentsorting->isEmpty()){
        // $content->sorting = 1;
        // }else{
        //     $content->sorting = $sorting_data;
        // }
        /*insert sorting*/

       //$section->instructor_id=1;
        $content->contenttype_id=$request->contenttypeid;
        $content->save();

        if($content->contenttype_id == 1){
            if($request->file()){
            $fileName=time().'_'.$request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('lessonimg', $fileName, 'public');
            $filepath='/storage/'.$path;
            }

            $lesson=new Lesson;
            $lesson->file=$filepath;
            $lesson->type=1;
            $lesson->content_id=$content->id;
            $lesson->save();
        }else if($content->contenttype_id == 3){

            if($request->file()){
            $fileName=time().'_'.$request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('assignmentimg', $fileName, 'public');
            $filepath='/storage/'.$path;
            }

            $assignment=new Assignment;
            $assignment->file=$filepath;
            $assignment->type=3;
            $assignment->content_id=$content->id;
            $assignment->save();

        }

        

       //return redirect()->route('backside.sectionlist',$request->sectionid);
      return redirect()->route('backside.section.index');
        
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
}
