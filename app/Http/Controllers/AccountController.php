<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Course;
use App\Models\Question;
use Auth;
use App\Events\NotiEvent;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuestionNotification;
use App\Notifications\AnswerNotification;
use App\Models\Answer;
use App\Events\AnswerEvent;
use App\Models\Sale;
use App\Models\Section;
// NYL
use App\Models\Collection;



class AccountController extends Controller
{

    public function mystudyings(){
        $tabs = 0;
        $wishlists = Wishlist::paginate(8);
        $user_id = Auth::id();

        $sales = Sale::where('user_id',$user_id)->with(array('courses'=>function($q){
            $q->wherePivot('status',1)->get();
        }))->paginate(8);

        $collections = Collection::all();
        
    	return view('account.mystudyings',compact('tabs','wishlists','sales','collections'));
    }

    public function wishlist(){
        $tabs = 2;
        $wishlists = Wishlist::paginate(8);
        $user_id = Auth::id();
        $sales = Sale::where('user_id',$user_id)->paginate(8);
        $collections = Collection::all();

        return view('account.mystudyings',compact('tabs','wishlists','sales','collections'));


    }

    public function collection(){

        $tabs = 1;
        $wishlists = Wishlist::paginate(8);
        $user_id = Auth::id();
        $sales = Sale::where('user_id',$user_id)->paginate(8);
        $collections = Collection::all();
        return view('account.mystudyings',compact('tabs','wishlists','sales','collections'));

    }


    public function add_course_collection($id)
    {
        
        $collection = Collection::find($id);
        $user_id = Auth::id();
        $sales = Sale::where('user_id',$user_id)->paginate(8);
        return view('account.add_course_collection',compact('sales','collection'));
    }

    public function store_course_collection(Request $request)
    {
        // dd($request);
        $courses_id = $request->course_collect_id;

        $collection_id = $request->collection_id;
        $collection = Collection::find($collection_id);
        $collection_data = array();
        $course_array = array();
        $data_false = true;
        if(count($collection->courses)>0){

            foreach ($collection->courses as $course) {
                // dd($course);
                foreach ($courses_id as $value) {
                   
                    if($course->pivot->course_id == $value){

                        array_push($collection_data , 'true');

                    }else{
                        
                        array_push($collection_data , 'false');
                        array_push($course_array, $value);

                    }
                    
                }
            }
        }else{

                array_push($collection_data , 'false');
                foreach ($courses_id as $value) { 
                    array_push($course_array, $value);
                }

        }
        dd($collection_data);
        
        foreach($collection_data as $colleciton_condition){
                

            if($colleciton_condition == 'false'){
                $data_false = false;

            }
        }

            if($data_false == false){
                $sorting_collection = $collection->courses()->orderByRaw("CAST(sorting as Integer) ASC")->get();
        

                foreach ($sorting_collection as $value) {
                    
                    $sorting = ++$value->pivot->sorting;
                }


                $data =[];
                if($sorting_collection->isEmpty()){
                    $sorting = 1;

                    for ($i=0; $i < count($course_array) ; $i++) { 
                   
                    
                        
                        $data[$i]['sorting']=$sorting++;
                        $data[$i]['course_id']=$course_array[$i];
                        $data[$i]['collection_id']=$collection_id;
                        

                    }
                    $collection->courses()->attach($data);

                }else{
                    for ($i=0; $i < count($course_array) ; $i++) {
                        // dd($sorting);
                        $data[$i]['sorting']=$sorting++;
                        $data[$i]['course_id']=$course_array[$i];
                        $data[$i]['collection_id']=$collection_id;
                    }
                    $collection->courses()->attach($data);
                        
                }
            }
            

        // return redirect()->route('collection');


    }




    public function purchase_history()
    {
        $sales = Sale::where("user_id",Auth::id())->get();
        return view('account.purchase_history',compact('sales'));
    }
    
    public function history_detial(Request $request)
    {
        $sale = Sale::find($request->id);
        return view('account.purchase_history_detail',compact('sale'));
    }

    

    public function lecture($courseid){
        $course = Course::find($courseid);

        $unorderedsections=Section::where('course_id', $courseid)->get();
        
        $sections = $unorderedsections->sort();
        // $contents=Content::all();
        // $lesson=Lesson::find($id);

        $questions = Question::all();
        $answers = Answer::all();

        return view('account.lecturevideo',compact('questions','answers', 'course', 'sections'));

    }

    public function panel(){
        $role = Auth::user()->getRoleNames();
        $user_id = Auth::id();

        //Admin
        if($role[0] == 'Admin'){
            $sales = Sale::whereHas('courses',function($q){
                        $q->where('course_sale.status',1);
                    })->where('sales.status',1)->get();
            $courses = Course::all();
            $recentcourses = Course::orderBy( 'id' , 'desc' )->limit(8)->get();

            return view('account.instructorpanel',compact('sales','courses','recentcourses'));
        }elseif($role[0] == 'Instructor'){
            // Instructor
    
           $sales = Sale::whereHas('courses',function($q){
                        $q->where('course_sale.status',1)->leftjoin('course_instructor','course_instructor.course_id','=','course_sale.course_id')->leftjoin('instructors','course_instructor.instructor_id','=','instructors.id')->where('instructors.user_id',Auth::id());
                    })->where('sales.status',1)->get();
            
            $courses = Course::whereHas('instructors',function($q){
                            $q->where('instructors.user_id',Auth::id());
                        })->get();

            $recentcourses = Course::whereHas('instructors',function($q){
                            $q->where('instructors.user_id',Auth::id());
                        })->orderBy('id','desc')->limit(8)->get();

            return view('account.instructorpanel',compact('sales','courses','recentcourses'));
        }elseif($role[0] == 'Business'){

            $sales = Sale::whereHas('courses',function($q){
                        $q->where('course_sale.status',1)->leftjoin('course_instructor','course_instructor.course_id','=','course_sale.course_id')->leftjoin('instructors','course_instructor.instructor_id','=','instructors.id')->leftjoin('users','users.id','=','instructors.user_id')->leftjoin('companies','companies.id','=','users.company_id')->where('instructors.user_id',Auth::id());
                    })->where('sales.status',1)->get();
            
              $courses = Course::whereHas('instructors',function($q){
                            $q->where('instructors.user_id',Auth::id())->leftjoin('users','users.id','=','instructors.user_id')->leftjoin('companies','companies.id','=','users.company_id');
                        })->get();

            $recentcourses = Course::whereHas('instructors',function($q){
                            $q->where('instructors.user_id',Auth::id())->leftjoin('users','users.id','=','instructors.user_id')->leftjoin('companies','companies.id','=','users.company_id');
                        })->orderBy('id','desc')->limit(8)->get();
            
            return view('account.instructorpanel',compact('sales','courses','recentcourses'));
        }
    }


    public function questionstore(Request $request)
    {
        $request->validate([
            'contentid' => 'required',
            'summary' => 'required',
            'comment' => 'required'
        ]);

        $question = new Question();
        $question->title = request('summary');
        $question->description = request('comment');
        $question->course_id = request('contentid');
        $question->user_id = Auth::id();
        if($question->save()){
            $questionnoti = [
                'id' => $question->id,
                'title' => request('summary'),
                'description' => request('comment'),
                'user_id' => Auth::id(),
                'course_id' => request('contentid')
            ];

            Notification::send($question,new QuestionNotification($questionnoti));
            event(new NotiEvent($question));

        }
        return redirect()->back();
    }

    public function questionnoti(){
        $noti_data=array();
        $bb = array();
        /*if(Auth::check()){*/

        $questions =  Question::all();
           
            foreach($questions as $quest){

                foreach($quest->unreadNotifications as $notification)
                    {
                        array_push($noti_data, $notification);
                    }
            }    /*$user  = Auth::user();*/
    
            /*dd($bb);
            foreach($bb as $bc){
                $dd = $bc->where('read_at',NULL)->orderBy('created_at','desc')->orderBy('read_at','desc')->get();
            }
            dd($dd);*/
        /*
       foreach ($data as $value) {
          array_push($noti_data, $value);
       }
       */
        return $noti_data;
    }

    public function questionshownoti(){
        $noti_data=array();
        $bdata = array();
            $questions =  Question::all();
           
            foreach($questions as $quest){

                foreach($quest->unreadNotifications as $notification)
                    {
                        array_push($noti_data, $notification);
                    }
            }
       
        return view('account.questionall',compact('noti_data'));
    }

    public function answerquestion(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'description' => 'required'
        ]);

        $answer = new Answer();
        $answer->description = request('description');
        $answer->question_id = request('question');
        $answer->user_id = 2;
        if($answer->save()){
            $answernoti = [
                'id' => $answer->id,
                'description' => request('description'),
                'user_id' => 2,
                'question_id' => request('question')
            ];

            Notification::send($answer,new AnswerNotification($answernoti));
            event(new AnswerEvent($answer));

        }
        $question = Question::find(request('question'));
        $question->unreadNotifications()->update(['read_at' => now()]);
        return redirect()->back();
    }


    public function answernoti(){
        $noti_data1=array();
        $cdata = array();
        /*if(Auth::check()){*/

            /*$user  = Auth::user();*/
    
            $answers = Answer::all();
            foreach($answers as $ans){
                $id = $ans->id;

                foreach($ans->unreadNotifications as $answer)
                    {
                        if($answer->data['answer_id'] == $id){
                            $data =$answer->where('read_at','=',NULL)->orderBy('created_at','desc')->get();
                            array_push($cdata, $data);

                        }
                        
                    }
            }
          
       foreach ($cdata as $value) {
        
          array_push($noti_data1, $value);
       }
      
       return $noti_data1;
    }


    public function questionreply(Request $request)
    {
        $questionid = $request->quesid;
        $answer = Answer::where('question_id',$questionid)->with('user')->get();
        $question = Question::where('id',$questionid)->with('user')->get();
        return response()->json(['answer'=>$answer,'question'=>$question]);
    }



    public function checkoutnoti()
    {
        $noti_data2=array();
        $outputdata = array();
        /*if(Auth::check()){*/

            /*$user  = Auth::user();*/
    
            $sales = Sale::all();
            foreach($sales as $sale){
                $id = $sale->id;

                foreach($sale->unreadNotifications as $sal)
                    {
                        
                            array_push($noti_data2, $sal);

                 
                        
                    }
            }
          
       return $noti_data2;
    }

}
