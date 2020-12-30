<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Answer;


use Auth;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authuser = Auth::user();
        $auth_id = Auth::id();
        $role = $authuser->getRoleNames();

        if (in_array($role[0], array('Admin','Developer'), true )) {
            $courses = Course::all();
            
            $questions = Question::orderBy('created_at', 'DESC')->get();
        }elseif($role[0] == 'Business'){
            $companyid = $authuser->company_id;

            $courses = Course::whereHas('instructors', function($q) use ($companyid)
            {
                $q->whereHas('user', function($q1) use ($companyid)
                {
                    $q1->where('company_id', '=', $companyid);
                });
            })->get();

            $courses_id = array();

            foreach ($courses as $course) {
                array_push($courses_id, $course->id);
            }

            if(count($courses_id) > 0){
            $questions = Question::whereIn('course_id', [$courses_id])->orderBy('created_at', 'DESC')->get(); 
            }else{
                $questions = [];
            }           

        }else{
            
            $instructor = $authuser->instructor;
            $instructorid = $instructor->id;

            $courses = Course::whereHas('instructors', function($q) use ($instructorid)
            {
                $q->where('instructor_id', '=', $instructorid);
                
            })->get();

            $courses_id = array();

            foreach ($courses as $course) {
                array_push($courses_id, $course->id);
            }
            if(count($courses_id) > 0){
            $questions = Question::whereIn('course_id', [$courses_id])->orderBy('created_at', 'DESC')->get();
        }else{
            $questions = [];
        }

        }
        if($questions != NULL && $courses != NULL){
            return view('question.list',compact('questions','courses'));
        }else{
            return redirect()->back();
        }

        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->unreadNotifications()->delete();
        
        $answer = Answer::where('question_id',$question->id)->get();


        return view('question.detail',compact('question','answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    public function getquestion(Request $request){

        $authuser = Auth::user();
        $auth_id = Auth::id();
        $role = $authuser->getRoleNames();

        $courseid = $request->id;

        if($courseid == 0){

            if (in_array($role[0], array('Admin','Developer'), true )) {
                $courses = Course::all();
                $questions = Question::orderBy('created_at', 'DESC')->get();
            }elseif($role[0] == 'Business'){
                $companyid = $authuser->company_id;

                $courses = Course::whereHas('instructors', function($q) use ($companyid)
                {
                    $q->whereHas('user', function($q1) use ($companyid)
                    {
                        $q1->where('company_id', '=', $companyid);
                    });
                })->get();

                $courses_id = array();

                foreach ($courses as $course) {
                    array_push($courses_id, $course->id);
                }


                $questions = Question::whereIn('course_id', [$courses_id])->orderBy('created_at', 'DESC')->get();            

            }else{
                
                $instructor = $authuser->instructor;
                $instructorid = $instructor->id;

                $courses = Course::whereHas('instructors', function($q) use ($instructorid)
                {
                    $q->where('instructor_id', '=', $instructorid);
                    
                })->get();

                $courses_id = array();

                foreach ($courses as $course) {
                    array_push($courses_id, $course->id);
                }

                $questions = Question::with(['user'])->whereIn('course_id', [$courses_id])->orderBy('created_at', 'DESC')->get();

            }

        }else{
            $questions = Question::with(['user','answers','course'])
            ->where('course_id', $courseid)
            ->orderBy('created_at', 'DESC')
            ->get();

        }


        return $questions;

    }
}
