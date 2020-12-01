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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CoursecountController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\JobtitleController;





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

/*
|--------------------------------------------------------------------------
| Frontend (Client) Frame
|--------------------------------------------------------------------------
*/
Route::get('/',[FrontendController::class, 'index'])->name('frontend.index');

// NYL
Route::get('courses',[FrontendController::class, 'courses'])->name('courses');
Route::get('/course/{id}',[FrontendController::class, 'coursedetail'])->name('course');
Route::get('cart',[FrontendController::class, 'addtocart'])->name('cart');

Route::get('instructors',[FrontendController::class, 'instructors'])->name('instructors');
Route::get('/instructor/{id}',[FrontendController::class, 'instructordetail'])->name('instructor');

//Honey
Route::get('business_info',[FrontendController::class,'business_info'])->name('business_info');
Route::get('instructor_info',[FrontendController::class,'instructor_info'])->name('instructor_info');

// ------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Backend (Admin) Frame
|--------------------------------------------------------------------------
*/

//KKS
Route::group(['prefix' => 'backside', 'as' => 'backside.'], function(){
    Route::resource('/course', CourseController::class);


    Route::resource('/category',CategoryController::class);
    Route::resource('/subcategory',SubcategoryController::class);
    Route::resource('/sale', SaleController::class);

    Route::resource('/section', SectionController::class);
    Route::get('/course/{id}/section',[SectionController::class, 'index'])->name('sectionlist');

    Route::resource('/content', ContentController::class);
    Route::resource('/lesson', LessonController::class);
    Route::resource('/assignment', AssignmentController::class);
    Route::resource('/attachment', AttachmentController::class);
    Route::resource('/companies', CompanyController::class);
    Route::resource('/instructors', InstructorController::class);
    Route::resource('/jobtitles', JobtitleController::class);

});

// ------------------------------------------------------------------------



/*
|--------------------------------------------------------------------------
| Backend (Instructor) Frame
|--------------------------------------------------------------------------
*/

Route::get('panel',[AccountController::class, 'panel'])->name('panel');


// ------------------------------------------------------------------------


/*
|--------------------------------------------------------------------------
| Backend (Account) Frame
|--------------------------------------------------------------------------
*/
Route::get('mystudyings',[AccountController::class, 'mystudyings'])->name('mystudyings');
Route::get('/lecture/{id}',[AccountController::class, 'lecture'])->name('lecture');


// NYL
Route::get('collection',[AccountController::class, 'collection'])->name('collection');
Route::get('wishlist',[AccountController::class, 'wishlist'])->name('wishlist');

// ------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Backend (Company) Frame
|--------------------------------------------------------------------------
*/

// ------------------------------------------------------------------------




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





// nyiyelin





// //ALS
// Route::get('coursecount','CoursecountController@coursecount')->name('coursecount');
Route::get('coursecount',[CoursecountController::class, 'coursecount'])->name('coursecount');


// Route::get('revenuereport','CoursecountController@revenuereport')->name('revenuereport');
Route::get('revenuereport',[CoursecountController::class, 'revenuereport'])->name('revenuereport');
