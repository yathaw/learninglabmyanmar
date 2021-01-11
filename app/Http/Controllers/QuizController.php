<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Test;
use App\Models\Section;
use App\Models\Check;

use App\Models\User;

use Auth;

class QuizController extends Controller
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

        if ($role[0] == 'Instructor') {
            $instructor = $authuser->instructor;
            $instructorid = $instructor->id;

            $courses = Course::whereHas('instructors', function($q) use ($instructorid)
            {
                $q->where('instructor_id', '=', $instructorid);
                
            })->get();

            

        }
        elseif ($role[0] == 'Business') {
            $companyid = $authuser->company_id;
            $instructors = User::where('company_id', $companyid)->get();

            $courses = Course::whereHas('instructors', function($q) use ($companyid)
            {
                $q->whereHas('user', function($q1) use ($companyid)
                {
                    $q1->where('company_id', '=', $companyid);
                });
            })->get();

        }
        else{
            
            $courses=Course::all();


        }
        return view('quiz.index',compact('courses'));
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
            'question' => 'required',
            'trueanswer' => 'required',
            'answer' => 'required',
        ]);


        if ($validator) 
        {
            $question = $request->question;
            $testid = $request->testid;
            $type = $request->type;
            $timer = $request->timer;

            $quiz = new Quiz;
            $quiz->question = $question;
            $quiz->type = $type;
            $quiz->timer = $timer;
            $quiz->test_id = $testid;
            $quiz->save();

            $answer = $request->answer;
            $trueanswer = $request->trueanswer;
            $mark = $request->marks;
            

            foreach ($answer as $key => $ans) {
                if ($ans) {
                    $flipped = array_flip($trueanswer);
                    $answer = new Check;
                    $answer->answer = $ans;

                    if(array_key_exists($key, $flipped)){
                        $answer->rightanswer = "true";
                    }else{
                        $answer->rightanswer = "false";
                    }
                    $answer->quiz_id = $quiz->id;
                    $answer->mark = $mark[$key];
                    $answer->save();
                }

            }
            return redirect()->back();


        }else{
            return response()->json(['error'=>$validator->errors()->all()]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id);
        $questions = Quiz::where('test_id',$id)->get();
        return view('quiz.detail',compact('test','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::with('checks')->where('id', $id)->first();
        
        return $quiz;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'question' => 'required',
            'trueanswer' => 'required',
            'answer' => 'required',
        ]);


        if ($validator) 
        {
            $question = $request->question;
            $testid = $request->testid;
            $type = $request->type;
            $timer = $request->timer;

            $quiz = Quiz::find($id);
            $quiz->question = $question;
            $quiz->type = $type;
            $quiz->timer = $timer;
            $quiz->test_id = $testid;
            $quiz->save();

            $answer = $request->answer;
            $trueanswer = $request->trueanswer;
            $mark = $request->marks;
            
            $answers = Check::where('quiz_id',$quiz->id)->get();
            foreach ($answers as $value) {
                $value->delete();
            }

            foreach ($answer as $key => $ans) {
                if ($ans) {
                    $flipped = array_flip($trueanswer);
                    $answer = new Check;
                    $answer->answer = $ans;

                    if(array_key_exists($key, $flipped)){
                        $answer->rightanswer = "true";
                    }else{
                        $answer->rightanswer = "false";
                    }
                    $answer->quiz_id = $quiz->id;
                    $answer->mark = $mark[$key];
                    $answer->save();
                }

            }
            return redirect()->back();


        }else{
            return response()->json(['error'=>$validator->errors()->all()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        $answers = Check::where('quiz_id',$quiz->id)->get();
        foreach ($answers as $value) {
            $value->delete();
        }
        return back();
    }

    public function getsection(Request $request){
        $courseid = $request->courseid;

        $sections = Section::where('course_id',$courseid)->get();

        return $sections;
    }

    
}
