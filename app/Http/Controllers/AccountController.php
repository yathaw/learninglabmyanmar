<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
	public function mystudyings(){
		$tabs = 0;
    	return view('account.mystudyings',compact('tabs'));
    }

    public function wishlist(){
		$tabs = 2;

    	return view('account.mystudyings',compact('tabs'));

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
