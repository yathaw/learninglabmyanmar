<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttachmentController;

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

//KKS
Route::resource('/course', CourseController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/subcategory',SubcategoryController::class);
Route::resource('/sale', SaleController::class);
Route::resource('/section', SectionController::class);
Route::resource('/content', ContentController::class);
Route::resource('/lesson', LessonController::class);
Route::resource('/assignment', AssignmentController::class);
Route::resource('/attachment', AttachmentController::class);



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

Route::resource('companies','CompanyController');

Route::resource('instructors','InstructorController');

Route::resource('jobtitles','JobtitleController');

//ALS
Route::get('coursecount','CoursecountController@coursecount')->name('coursecount');

Route::get('revenuereport','CoursecountController@revenuereport')->name('revenuereport');