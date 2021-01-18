<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title'  =>'required',
            'description'  =>'required',
            'sectionid' =>'required'
            
        ]);
        if ($validator) 
        {

            $title = $request->title;
            $description = $request->description;
            $sectionid = $request->sectionid;
            
            // Data Insert
            $test = new Test;
            $test->title = $title;
            $test->description = $description;
            $test->section_id = $sectionid;

            $test->save();      
            
            return response()->json(['success'=>'Quiz <b> SAVED </b> successfully.']);
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title'  =>'required',
            'description'  =>'required',
            'sectionid' =>'required'
            
        ]);
        if ($validator) 
        {

            $title = $request->title;
            $description = $request->description;
            $sectionid = $request->sectionid;
            
            // Data Insert
            $test = Test::find($id);
            $test->title = $title;
            $test->description = $description;
            $test->section_id = $sectionid;

            $test->save();      
            
            return response()->json(['success'=>'Quiz <b> SAVED </b> successfully.']);
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
