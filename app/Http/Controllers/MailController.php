<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SignupEmail;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{
	public static function sendSignupEmail($name, $email){

		$data = [
			'name' => $name,
			'email' => $email
		];
		
		Mail::to($email)->send(new SignupEmail($data));
	}
}
