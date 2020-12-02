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


class AccountController extends Controller
{
	public function mystudyings(){
		$tabs = 0;
    	return view('account.mystudyings',compact('tabs'));
    }

    public function wishlist(){
		$tabs = 2;
        $wishlists = Wishlist::paginate(8);
    	return view('account.mystudyings',compact('tabs','wishlists'));

    }

    public function collection(){
		$tabs = 1;
    	return view('account.mystudyings',compact('tabs'));
    }

    public function lecture($id){
        $questions = Question::all();
    	return view('account.lecturevideo',compact('questions'));
    }

    public function panel(){
        // Instructor
        return view('account.instructorpanel');
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
        $question->user_id = 1;
        if($question->save()){
            $questionnoti = [
                'id' => $question->id,
                'title' => request('summary'),
                'description' => request('comment'),
                'user_id' => 1,
                'course_id' => request('contentid')
            ];

            Notification::send($question,new QuestionNotification($questionnoti));
            event(new NotiEvent($question));

        }
        return redirect()->back();
    }

    public function questionnoti(){
        $noti_data=array();
        /*if(Auth::check()){*/

            /*$user  = Auth::user();*/
    
            $questions = Question::all();
            foreach($questions as $quest){
                foreach($quest->unreadNotifications as $notification)
                    {
                        $data =$notification->where('read_at','=',NULL)->orderBy('created_at','desc')->get();
                        
                    }

            
       /* }*/
   }
   foreach ($data as $value) {
      array_push($noti_data, $value);
   }
   return $noti_data;
            
    }
}
