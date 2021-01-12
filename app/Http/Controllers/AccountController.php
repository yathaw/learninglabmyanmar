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
use App\Models\User;
use App\Models\Lesson;
use App\Models\Instructor;

use Illuminate\Support\Facades\Mail;


// NYL
use App\Models\Collection;

// YTMN
use App\Models\Test;
use App\Models\Quiz;
use App\Models\Response;
use App\Models\Responsedetail;




class AccountController extends Controller
{
    public function __construct(){
        $this->middleware(['role:Admin|Instructor|Business'])->only('panel');
        $this->middleware(['role:Instructor'])->only('questionreply');
    }

    public function mystudyings(){
        $tabs = 0;
        $wishlists = Wishlist::paginate(8);
        $user_id = Auth::id();

        $sales = Sale::where('user_id',$user_id)->with(array('courses'=>function($q){
            $q->wherePivot('status',1)->get();
        }))->paginate(8);

        
        $completelessons = array();

        foreach ($sales as $sale) {
            foreach ($sale->courses as $course) {
                $courseid = $course['id'];
                $count_section = count($course->sections);
                $count_content = count($course->contents);

                $completelesson = array(
                        'courseid'          => $courseid,
                        'count_section'     => $count_section,
                        'count_content'     => $count_content,
                        'lessons'           => array()
                    );


                foreach($course->sections as $section)
                {


                    foreach ($section->contents as $key => $content) {
                        // Lesson
                        if ($content->contenttype_id == 1) {
                            foreach ($content->lessons as $lesson) {

                                $lesson_id = $lesson->id;

                                $get_completeLesson = User::with(['lessons' => function($q) use($user_id, $lesson_id)    {
                                    $q->where('lesson_user.user_id', $user_id);
                                    $q->where('lesson_user.lesson_id', $lesson_id);
                                    $q->where('lesson_user.status',1);

                                }]) 
                                ->find($user_id);

                                foreach ($get_completeLesson->lessons as $user_lesson) {
                                    $pivot_lesson_id = $user_lesson->pivot->lesson_id;
                                    $pivot_status = $user_lesson->pivot->status;
                                    $pivot_timeline = $user_lesson->pivot->timeline;

                                    $completelesson['lessons'][] = array(
                                        'lesssonid'    =>  $pivot_lesson_id,
                                        'status'    =>  $pivot_status,
                                        'timeline'    =>  $pivot_timeline,
                                        
                                    );

                                    // array_push($completelessons, $completelesson);
                                    
                                }


                            }
                        }
                    }

                }

                array_push($completelessons,  $completelesson);

            }
        }

        // dd($sales);
        // dd($completelessons);

        // die();

        $collections = Collection::all();
        
    	return view('account.mystudyings',compact('tabs','wishlists','sales','collections','completelessons'));
    }

    public function wishlist(){
        $tabs = 2;
        $wishlists = Wishlist::where('user_id',Auth::id())->paginate(8);
        $user_id = Auth::id();

        $sales = Sale::where('user_id',$user_id)->with(array('courses'=>function($q){
            $q->wherePivot('status',1)->get();
        }))->paginate(8);

        
        $completelessons = array();

        foreach ($sales as $sale) {
            foreach ($sale->courses as $course) {
                $courseid = $course['id'];
                $count_section = count($course->sections);
                $count_content = count($course->contents);

                $completelesson = array(
                        'courseid'          => $courseid,
                        'count_section'     => $count_section,
                        'count_content'     => $count_content,
                        'lessons'           => array()
                    );


                foreach($course->sections as $section)
                {


                    foreach ($section->contents as $key => $content) {
                        // Lesson
                        if ($content->contenttype_id == 1) {
                            foreach ($content->lessons as $lesson) {

                                $lesson_id = $lesson->id;

                                $get_completeLesson = User::with(['lessons' => function($q) use($user_id, $lesson_id)    {
                                    $q->where('lesson_user.user_id', $user_id);
                                    $q->where('lesson_user.lesson_id', $lesson_id);
                                    $q->where('lesson_user.status',1);

                                }]) 
                                ->find($user_id);

                                foreach ($get_completeLesson->lessons as $user_lesson) {
                                    $pivot_lesson_id = $user_lesson->pivot->lesson_id;
                                    $pivot_status = $user_lesson->pivot->status;
                                    $pivot_timeline = $user_lesson->pivot->timeline;

                                    $completelesson['lessons'][] = array(
                                        'lesssonid'    =>  $pivot_lesson_id,
                                        'status'    =>  $pivot_status,
                                        'timeline'    =>  $pivot_timeline,
                                        
                                    );

                                    // array_push($completelessons, $completelesson);
                                    
                                }


                            }
                        }
                    }

                }

                array_push($completelessons,  $completelesson);

            }
        }
        $collections = Collection::all();



        return view('account.mystudyings',compact('tabs','wishlists','sales','collections','completelessons'));


    }

    public function collection(){

        $tabs = 1;
        $wishlists = Wishlist::paginate(8);
        $user_id = Auth::id();
        $sales = Sale::where('user_id',$user_id)->with(array('courses'=>function($q){
            $q->wherePivot('status',1)->get();
        }))->paginate(8);

        
        $completelessons = array();

        foreach ($sales as $sale) {
            foreach ($sale->courses as $course) {
                $courseid = $course['id'];
                $count_section = count($course->sections);
                $count_content = count($course->contents);

                $completelesson = array(
                        'courseid'          => $courseid,
                        'count_section'     => $count_section,
                        'count_content'     => $count_content,
                        'lessons'           => array()
                    );


                foreach($course->sections as $section)
                {


                    foreach ($section->contents as $key => $content) {
                        // Lesson
                        if ($content->contenttype_id == 1) {
                            foreach ($content->lessons as $lesson) {

                                $lesson_id = $lesson->id;

                                $get_completeLesson = User::with(['lessons' => function($q) use($user_id, $lesson_id)    {
                                    $q->where('lesson_user.user_id', $user_id);
                                    $q->where('lesson_user.lesson_id', $lesson_id);
                                    $q->where('lesson_user.status',1);

                                }]) 
                                ->find($user_id);

                                foreach ($get_completeLesson->lessons as $user_lesson) {
                                    $pivot_lesson_id = $user_lesson->pivot->lesson_id;
                                    $pivot_status = $user_lesson->pivot->status;
                                    $pivot_timeline = $user_lesson->pivot->timeline;

                                    $completelesson['lessons'][] = array(
                                        'lesssonid'    =>  $pivot_lesson_id,
                                        'status'    =>  $pivot_status,
                                        'timeline'    =>  $pivot_timeline,
                                        
                                    );

                                    // array_push($completelessons, $completelesson);
                                    
                                }


                            }
                        }
                    }

                }

                array_push($completelessons,  $completelesson);

            }
        }
        $collections = Collection::where('user_id',Auth::id())->get();
        return view('account.mystudyings',compact('tabs','wishlists','sales','collections','completelessons'));

    }


    public function add_course_collection(Request $request)
    {
        
        // $collection = Collection::find($request->id);
        // $user_id = Auth::id();
        // $sales = Sale::where('user_id',$user_id)->with(array('courses'=>function($q){
        //     $q->wherePivot('status',1)->with('collections');
        // }))->get();


        $collection = Collection::find($request->id);
        $user_id = Auth::id();

        $sales = Sale::where('user_id',$user_id)->with(array('courses'=>function($q)use($collection){
            $q->wherePivot('status',1)->with(array('collections'=>function($query)use($collection){
                $query->where('collections'.'.id',$collection->id)->get();
            }))->get();
        }))->get();

        return response()->json($sales);

    }



    public function store_course_collection(Request $request){

        $collection = Collection::find($request->id);

        $course_array = $request->course_id;
       

        // if(count($collection->courses())>0){
        $sorting_collection = $collection->courses()->orderByRaw("CAST(sorting as Integer) ASC")->get();
        // }

        foreach ($sorting_collection as $value) {
                
                $sorting = ++$value->pivot->sorting;
            }


            $data =[];
            if($sorting_collection->isEmpty()){
                $sorting = 1;

                for ($i=0; $i < count($course_array) ; $i++) { 
               
                
                    
                    $data[$i]['sorting']=$sorting++;
                    $data[$i]['course_id']=$course_array[$i];
                    $data[$i]['collection_id']=$request->id;
                    

                }
                $collection->courses()->attach($data);

            }else{
                for ($i=0; $i < count($course_array) ; $i++) {
                    // dd($sorting);
                    $data[$i]['sorting']=$sorting++;
                    $data[$i]['course_id']=$course_array[$i];
                    $data[$i]['collection_id']=$request->id;
                }
                $collection->courses()->attach($data);
                    
            }

            return redirect()->route('collection');
            

    }

    public function edit_course_collection(Request $request)
    {
        $collection = Collection::find($request->id);
        $user_id = Auth::id();

        $sales = Sale::where('user_id',$user_id)->with(array('courses'=>function($q)use($collection){
            $q->wherePivot('status',1)->with(array('collections'=>function($query)use($collection){
                $query->where('collections'.'.id',$collection->id)->get();
            }))->get();
        }))->get();

        return response()->json($sales);
    }

    public function update_course_collection(Request $request)
    {   
        
        $collection = Collection::find($request->id);
        if($request->course_id){
        $course_array = $request->course_id;
        sort($course_array);
        $count_course_array = count($course_array);
        }else{
        $count_course_array = 0;

        }
        $sorting_collection = $collection->courses()->orderByRaw('course_id','ASC')->get();
        $array_id=array();
        
        $data=[];

        // foreach ($sorting_collection as $value) {
        //     $sorting = ++$value->pivot->sorting;
        //     // dd($value->pivot);
        // }


        if($count_course_array > count($collection->courses)){
            // attach data
            dd('hey');

        }elseif($count_course_array < count($sorting_collection)){
            
            for ($i=0; $i < count($sorting_collection) ; $i++) { 
                if(empty($course_array[$i])){
                    $course_array[$i]= '' ;
                    if($course_array[$i] != $sorting_collection[$i]->pivot->course_id){
                        // dd($course_array[$i] .'!='. $sorting_collection[$i]->pivot->course_id.'/'.$i);

                        $data[$i]['sorting']=$sorting_collection[$i]->pivot->sorting;
                        $data[$i]['course_id']=$sorting_collection[$i]->pivot->course_id;
                        $data[$i]['collection_id']=$request->id;
                        array_push($array_id,$sorting_collection[$i]->pivot->course_id);
                    }
                    
                    
                }

               
            }
            // dd($data);
            foreach ($data as $value) {
                // dd($value['course_id']);
                $collection->courses()->where('course_id',$value['course_id'])->delete();
            }
            

            
            return redirect()->route('collection');
                

        }elseif(count($course_array) == count($collection->courses)){
            // detach and attach data
            dd('hello');
        }


          

                // for ($i=0; $i < count($course_array) ; $i++) { 
                    
                //     $data[$i]['sorting']=$sorting++;
                //     $data[$i]['course_id']=$course_array[$i];
                //     $data[$i]['collection_id']=$request->id;
                    

                // }
                // dd($data);
                // $collection->courses()->updateExistingPivot($data);





    }


    public function purchase_history()
    {
        $sales = Sale::where("user_id",Auth::id())->get();
        // dd($sales);
        return view('account.purchase_history',compact('sales'));
    }
    
    public function history_detial(Request $request)
    {
        $sale = Sale::find($request->id);
        return view('account.purchase_history_detail',compact('sale'));
    }

    

    public function lecture($courseid){
        $user_id = Auth::id();

        $course = Course::find($courseid);

        $unorderedsections=Section::where('course_id', $courseid)->get();
        
        $sections = $unorderedsections->sortBy('sorting');
        // dd($sections);
        $user = User::find($user_id);

        $completeLessons = array();

        $user_lesson = User::with(['lessons' => function($q) use($user_id)    {
                $q->where('lesson_user.user_id', $user_id);
                $q->where('lesson_user.status',1);
            }]) 
            ->find($user_id);


        $instructors = User::whereHas('instructor', function($q) use ($courseid)
            {
                $q->whereHas('courses', function($q1) use ($courseid)
                {
                    $q1->where('course_instructor.course_id', '=', $courseid);
                });
            })
            ->role('Instructor')
            ->get();

        foreach ($user_lesson->lessons as $user_lesson) {
            $pivot_lesson_id = $user_lesson->pivot->lesson_id;
            $pivot_status = $user_lesson->pivot->status;
            $pivot_timeline = $user_lesson->pivot->timeline;

            $learninglesson = array(
                'lesssonid'    =>  $pivot_lesson_id,
                'status'    =>  $pivot_status,
                'timeline'    =>  $pivot_timeline
            );

            array_push($completeLessons, $learninglesson);
            
        }
        // dd($completeLessons);
        // $contents=Content::all();
        // $lesson=Lesson::find($id);

        $questions = Question::with(['user','answers','course'])
            ->where('course_id', $course->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $answers = Answer::all();

        return view('account.lecturevideo',compact('questions','answers', 'course', 'sections','user_id','completeLessons','instructors'));

    }

    public function lesson_user(Request $request){
        $lesson_id = $request->lesson_id;
        $pause_duration = $request->duration;
        $user_id = $request->user_id;

        $lesson = Lesson::find($lesson_id);
        $user = User::find($user_id);

        $duration = $lesson->duration;

        if ($duration == $pause_duration) {
            $status = 1; // Complete;
        }else{
            $status = 0;
        }


        $user_lessons = $user->whereHas('lessons', function($q) use ($lesson_id)
            {
                $q->where('lesson_user.lesson_id', '=', $lesson_id);
            })
            ->get();

        if($user_lessons->isEmpty()){
            $user->lessons()->attach($lesson_id,['status' => $status, 'timeline' => $pause_duration ]);
        }else{
            foreach ($user->lessons as $user_lesson) {
                $pivot_lesson_id = $user_lesson->pivot->lesson_id;
                $pivot_status = $user_lesson->pivot->status;
                $pivot_timeline = $user_lesson->pivot->timeline;

                if ($lesson_id == $pivot_lesson_id && $pivot_status != 1) {
                    
                    if ($pause_duration >$pivot_timeline) {
                        $user->lessons()->updateExistingPivot($lesson_id,['status' => $status, 'timeline' => $pause_duration ]);
                    }
                    

                } 
            }
        }

    }

    public function lesson_state(Request $request){
        $lesson_id = $request->lesson_id;
        $user_id = $request->user_id;

        $user_lesson = User::with(['lessons' => function($q) use($user_id, $lesson_id)    {
            $q->where('lesson_user.user_id', $user_id);
            $q->where('lesson_user.lesson_id', $lesson_id);
            $q->where('lesson_user.status',0);

        }]) 
        ->find($user_id);
        $learninglesson = array();

        foreach ($user_lesson->lessons as $user_lesson) {
            $pivot_lesson_id = $user_lesson->pivot->lesson_id;
            $pivot_status = $user_lesson->pivot->status;
            $pivot_timeline = $user_lesson->pivot->timeline;

            $learninglesson = array(
                'lesssonid'    =>  $pivot_lesson_id,
                'status'    =>  $pivot_status,
                'timeline'    =>  $pivot_timeline
            );
            
        }
        return $learninglesson;
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


            $totals = Course::join('course_sale','course_sale.course_id','=','courses.id')->join('sales','course_sale.sale_id','=','sales.id')->where('sales.status',1)->where('course_sale.status',1)->get();
            
            $totalprices;
            $prices = 0;
                $price=$price1=$price2=$price3=$price4=$price5=$price6=$price7=$price8=$price9=$price10=$price11 = 0;
            foreach ($totals as $total) {
                $m = $total->created_at->format('M');
                $y = $total->created_at->format('Y');
                $current = date('Y');
                
                if($current == $y){
                    switch ($m) {
                    case 'Jan':
                        $price += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Feb':
                        $price1 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Mar':
                        $price2 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Apr':
                        $price3 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'May':
                        $price4 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Jun':
                        $price5 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Jul':
                        $price6 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Aug':
                        $price7 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Sep':
                        $price8 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Oct':
                        $price9 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Nov':
                        $price10 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Dec':
                        $price11 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        
                        break;
                    
                    default:
                        # code...
                        break;
                    }

                }
                
               
            }
            if($prices > 0){
            $totalprices = implode(',', $prices);
            }else{
                $prices = [0,0,0,0,0,0,0,0,0,0,0,0];
                $totalprices = implode(',', $prices);
                
            }

            return view('account.instructorpanel',compact('sales','courses','recentcourses','totalprices'));
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

            $totals = Course::whereHas('instructors',function($q){
                $q->where('instructors.user_id',Auth::id());
            })->join('course_sale','course_sale.course_id','=','courses.id')->join('sales','course_sale.sale_id','=','sales.id')->where('sales.status',1)->where('course_sale.status',1)->get();
            
            $totalprices;
            $prices = 0;
                $price=$price1=$price2=$price3=$price4=$price5=$price6=$price7=$price8=$price9=$price10=$price11 = 0;
            foreach ($totals as $total) {
                $m = $total->created_at->format('M');
                $y = $total->created_at->format('Y');
                $current = date('Y');
                
                if($current == $y){
                    switch ($m) {
                    case 'Jan':
                        $price += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Feb':
                        $price1 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Mar':
                        $price2 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Apr':
                        $price3 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'May':
                        $price4 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Jun':
                        $price5 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Jul':
                        $price6 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Aug':
                        $price7 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Sep':
                        $price8 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Oct':
                        $price9 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Nov':
                        $price10 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Dec':
                        $price11 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        
                        break;
                    
                    default:
                        # code...
                        break;
                    }

                }
                
               
            }
            if($prices > 0){
            $totalprices = implode(',', $prices);
            }else{
                $prices = [0,0,0,0,0,0,0,0,0,0,0,0];
                $totalprices = implode(',', $prices);
                
            }
            return view('account.instructorpanel',compact('sales','courses','recentcourses','totalprices'));
        }elseif($role[0] == 'Business'){
            $user = User::find(Auth::id());
            $company = $user->company->id;
            $sales = Sale::whereHas('courses',function($q) use ($company){
                        $q->where('course_sale.status',1)->leftjoin('course_instructor','course_instructor.course_id','=','course_sale.course_id')->leftjoin('instructors','course_instructor.instructor_id','=','instructors.id')->leftjoin('users','instructors.user_id','=','users.id')->where('users.company_id',$company);
                    })->where('sales.status',1)->get();

            
              $courses = Course::whereHas('instructors',function($q) use ($company){
                            $q->leftjoin('users','users.id','=','instructors.user_id')->where('users.company_id',$company);
                        })->get();

            $recentcourses = Course::whereHas('instructors',function($q) use ($company){
                            $q->leftjoin('users','users.id','=','instructors.user_id')->where('users.company_id',$company);
                        })->orderBy('id','desc')->limit(8)->get();
            
            $totals = Course::whereHas('instructors',function($q) use ($company){
                $q->leftjoin('users','users.id','=','instructors.user_id')->where('users.company_id',$company);
            })->join('course_sale','course_sale.course_id','=','courses.id')->join('sales','course_sale.sale_id','=','sales.id')->where('sales.status',1)->where('course_sale.status',1)->get();
            
            $totalprices;
            $prices = 0;
                $price=$price1=$price2=$price3=$price4=$price5=$price6=$price7=$price8=$price9=$price10=$price11 = 0;
            foreach ($totals as $total) {
                $m = $total->created_at->format('M');
                $y = $total->created_at->format('Y');
                $current = date('Y');
                
                if($current == $y){
                    switch ($m) {
                    case 'Jan':
                        $price += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Feb':
                        $price1 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Mar':
                        $price2 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Apr':
                        $price3 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'May':
                        $price4 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Jun':
                        $price5 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Jul':
                        $price6 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Aug':
                        $price7 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Sep':
                        $price8 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Oct':
                        $price9 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Nov':
                        $price10 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        break;

                    case 'Dec':
                        $price11 += $total->price;
                        $prices = [$price,$price1,$price2,$price3,$price4,$price5,$price6,$price7,$price8,$price9,$price10,$price11];
                        
                        break;
                    
                    default:
                        # code...
                        break;
                    }

                }
                
               
            }
            if($prices > 0){
            $totalprices = implode(',', $prices);
            }else{
                $prices = [0,0,0,0,0,0,0,0,0,0,0,0];
                $totalprices = implode(',', $prices);
                
            }
            return view('account.instructorpanel',compact('sales','courses','recentcourses','totalprices'));
        }
    }


    public function questionstore(Request $request)
    {
        $request->validate([
            'contentid' => 'required',
            'summary' => 'required',
            'comment' => 'required'
        ]);

        // dd(request('comment'));
        

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

            $user=User::find(Auth::id());
            $fromemail = $user->email;
            $course = Course::find(request('contentid'));
            $coursename = $course->title;

            foreach ($course->instructors as $key => $value) {
               $to_name  = $value->user->name;
               $to_email = $value->user->email;
               $data = array('coursetitle'=>$coursename, "title" => request('summary'),"comment"=>request('comment'));
                
                Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email,$fromemail,$user) {
                    $message->to($to_email, $to_name)
                            ->subject('Learning Lab Myanmar Student Question Mail');
                    $message->from($fromemail,$user->name);
                });
            }
        
            /*$to_name = 'Aye Lwin Soe';
            $to_email = 'ayelwinsoe.it2018@gmail.com';*/
            
        }
        return redirect()->back();
    }

    public function questionnoti(){
        $user = User::find(Auth::id());
        
        $questions = Question::with('course')->whereHas('course.instructors',function($q){
            $q->where('instructors.user_id',Auth::id());
        })->get();
        
        $noti_data=array();
        $bb = array();
        /*if(Auth::check()){*/

        //$questions =  Question::all();
           
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
            'questionid' => 'required',
            'description' => 'required'
        ]);

        $answer = new Answer();
        $answer->description = request('description');
        $answer->question_id = request('questionid');
        $answer->user_id = 2;
        if($answer->save()){
            $answernoti = [
                'id' => $answer->id,
                'description' => request('description'),
                'user_id' => 2,
                'question_id' => request('questionid')
            ];

            Notification::send($answer,new AnswerNotification($answernoti));
            event(new AnswerEvent($answer));

        }
        $question = Question::find(request('questionid'));
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
                $user = Auth::id();
                foreach($ans->unreadNotifications as $answer)
                    {
                        $quest = $answer->data['question_id'];
                        $questionuser = Question::find($quest);
                        $userid = $questionuser->user->id;

                        if($answer->data['answer_id'] == $id && $userid == $user){
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
        $userid = Auth::id();
        
        $answeruserid = Answer::where('question_id',$questionid)->with('user')->get();
        foreach($answeruserid as $ans){
            foreach($ans->unreadNotifications as $answer)
                    {
                        $quest = $answer->data['question_id'];
                        $questionuser = Question::find($questionid);
                        $user = $questionuser->user->id;

                        if($answer->data['answer_id'] == $ans->id && $userid == $user){
                            $ans->unreadNotifications()->delete();
                            echo "success";
                        }
                    }
        }

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


    public function signupnoti($value='')
    {
        $noti_data2=array();
        $outputdata = array();
        /*if(Auth::check()){*/

            /*$user  = Auth::user();*/
    
            $users = User::all();
            foreach($users as $user){
                $id = $user->id;

                foreach($user->unreadNotifications as $sal)
                    {
                        
                            array_push($noti_data2, $sal);

                 
                        
                    }
            }
       return $noti_data2;
    }

    public function removesignupnoti(Request $request)
    {
        $user = User::find($request->id);
        $user->unreadNotifications()->delete();
        echo "success";
    }

    public function startquiz($testid){

        $test = Test::find($testid);
        $questions = Quiz::where('test_id',$testid)->get();

        $totalQuiz = count($questions);
        $totalTimer = 0;
        $timers = array();

        $marks = 0; $totalmark = 0;

        foreach ($questions as $question) {
            $timer = $question->timer;

            if (!in_array($timer, $timers)) {
                array_push($timers, $timer);
            }

            foreach ($question->checks as $check) {
                $mark = (int)$check->mark;
                
                if ($mark > 0) {
                    $totalmark += $marks + $mark;
                }
                if($mark < 0){
                    $totalmark += $marks - abs($mark); 
                }
            }

            $totalTimer += $timer++;
        }

        return view('account.quiz',compact('test','totalQuiz', 'totalTimer', 'timers', 'questions', 'totalmark'));
    }

    public function getquiz(Request $request){
        $questions = Quiz::with('checks')
                    ->where('test_id',$request->testId)->get();

        return response()->json(['data'=>$questions]);
    }



    public function storequiz(Request $request){
        $testId = $request->testId;
        $correctMark = $request->correctMark;
        $datas = $request->cart;

        $auth_userid = Auth::user()->id;

        $existingResponse = Response::where('user_id',$auth_userid)
                            ->where('test_id','=',$testId)
                            ->first();


        if($existingResponse == NULL){
            $response = new Response;
            $response->score = $correctMark;
            $response->status = 0;
            $response->user_id = Auth::user()->id;
            $response->test_id = $testId;
            $response->save();

            foreach ($datas as $data) {
                // dd($data);
                if ($data['checkid'] != 'null') {
                    $checkid = $data['checkid'];
                }else{
                    $checkid = 0;
                }
                $responsedetail = new Responsedetail;
                $responsedetail->check_id = $checkid;
                $responsedetail->quiz_id = $data['quizid'];
                $responsedetail->response_id = $response->id;
                $responsedetail->status = $data['status'];

                $responsedetail->save();
            }
            
        }else{
            $responseid = $existingResponse->id;

            $response = Response::find($responseid);
            $response->score = $correctMark;
            $response->status = 0;
            $response->user_id = Auth::user()->id;
            $response->test_id = $testId;
            $response->save();

            $responsedetails = Responsedetail::where('response_id',$responseid)->get();
            foreach ($responsedetails as $responsedetail) {
                $responsedetail->delete();
            }

            foreach ($datas as $data) {
                // dd($data);
                if ($data['checkid'] != 'null') {
                    $checkid = $data['checkid'];
                }else{
                    $checkid = 0;
                }
                $responsedetail = new Responsedetail;
                $responsedetail->check_id = $checkid;
                $responsedetail->quiz_id = $data['quizid'];
                $responsedetail->response_id = $responseid;
                $responsedetail->status = $data['status'];

                $responsedetail->save();
            }

            
        }

        return response()->json(['data'=>'ok']);
        
    }



    public function getscore(Request $request){
        $responseid = $request->responseId;

        $response = Response::with('responsedetails')
                    ->find($responseid);

        $questions = Quiz::with('checks')
                    ->where('test_id',$response->test_id)->get();  


        return response()->json(['response'=>$response, 'questions'=>$questions]);


    }
























}
