<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Course;

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
    	return view('account.lecturevideo');
    }

    public function panel(){
        // Instructor
        return view('account.instructorpanel');
    }

    
}
