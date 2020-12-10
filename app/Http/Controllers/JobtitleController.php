<?php

namespace App\Http\Controllers;

use App\Models\Jobtitle;
use Illuminate\Http\Request;

class JobtitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobtitles = Jobtitle::all();
        return view('jobs.index',compact('jobtitles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'

        ]);

        $jobtitle = new Jobtitle();
        $jobtitle->name = request('name');
        $jobtitle->save();
        return redirect()->route('backside.jobtitles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function show(Jobtitle $jobtitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobtitle $jobtitle)
    {
        return view('jobs.edit',compact('jobtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobtitle $jobtitle)
    {
        $request->validate([
            'name' => 'required'

        ]);

      
        $jobtitle->name = request('name');
        $jobtitle->save();
        return redirect()->route('jobtitles.backside.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobtitle $jobtitle)
    {
        $jobtitle->delete();
        return redirect()->route('backside.jobtitles.index');
        

    }
}
