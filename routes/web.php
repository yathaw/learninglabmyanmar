<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('frontside', function () {
    return view('frontend');
});

Route::get('backside', function () {
    return view('backend');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// nyiyelin
Route::get('wishlist', function () {
    return view('frontend.wishlist');
})->name('wishlist');

Route::get('collection', function () {
    return view('frontend.collection');
})->name('collection');

Route::get('course', function () {
    return view('frontend.course');
})->name('course');

Route::get('coursedetail', function () {
    return view('frontend.coursedetail');
})->name('coursedetail');


Route::get('addtocart', function () {
    return view('frontend.addtocart');
})->name('addtocart');




//Honey
Route::get('business',function () {
	return view('business_info');
});

Route::get('instructor',function () {
	return view('instructor_info');
});


//ALS
Route::get('coursecount','CoursecountController@coursecount')->name('coursecount');
