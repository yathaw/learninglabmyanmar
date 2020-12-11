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

//KYW
use App\Http\Controllers\BackendController;

// NYL
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstallmentController;

//HH
use App\Http\Controllers\Auth\LoginController;


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

Route::post('courses_search',[FrontendController::class, 'courses_search'])->name('courses_search');

Route::post('searchmystudying',[FrontendController::class, 'searchmystudying'])->name('searchmystudying');

Route::post('wishlist_search',[FrontendController::class, 'wishlist_search'])->name('wishlist_search');

Route::post('wishlist_save',[FrontendController::class, 'wishlist_save'])->name('wishlist_save');

Route::post('removewishlist',[FrontendController::class, 'removewishlist'])->name('removewishlist');

Route::get('/course/{id}',[FrontendController::class, 'coursedetail'])->name('course');

Route::get('cart',[FrontendController::class, 'addtocart'])->name('cart');

Route::post('course_sale',[FrontendController::class, 'course_sale'])->name('course_sale');


Route::get('instructors',[FrontendController::class, 'instructors'])->name('instructors');

Route::get('/instructor/{id}',[FrontendController::class, 'instructordetail'])->name('instructor');

//Honey
Route::get('business_info',[FrontendController::class,'business_info'])->name('business_info');
Route::post('business_store',[FrontendController::class,'business_store'])->name('business.store');

Route::get('instructor_info',[FrontendController::class,'instructor_info'])->name('instructor_info');
Route::post('instructor_store',[FrontendController::class,'instructor_store'])->name('instructor.store');
Route::post('login_data',[LoginController::class,'login_store'])->name('frontend_login');

// ------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Backend (Admin) Frame
|--------------------------------------------------------------------------
*/

//KKS
Route::group(['middleware' => 'role:admin', 'prefix' => 'backside', 'as' => 'backside.'], function(){
    Route::resource('/course', CourseController::class);


    Route::resource('/category',CategoryController::class);
    Route::resource('/subcategory',SubcategoryController::class);
    Route::resource('/sale', SaleController::class);
//NYL 
    Route::post('remove_sale_course',[SaleController::class,'remove_sale_course'])->name('remove_sale_course');

    Route::resource('/section', SectionController::class);
//KYW
   
    Route::get('/section/{section}/edit',[SectionController::class,'edit'])->name('sectionedit');
    Route::post('/section/getcontenttype',[SectionController::class,'getcontenttype'])->name('getcontenttype');
    Route::post('/getinstructor',[SectionController::class,'getinstructor'])->name('getinstructor');
    Route::post('/sectionupdate/{id}',[BackendController::class,'sectionupdate'])->name('sectionupdate');
   


    Route::get('/course/{id}/section',[SectionController::class, 'index'])->name('sectionlist');
    
    Route::resource('/content', ContentController::class);
    Route::post('/section/getsectionid',[ContentController::class,'getsectionid'])->name('getsectionid');
    Route::post('/content/getcontentid',[ContentController::class,'getcontentid'])->name('getcontentid');

    Route::resource('/lesson', LessonController::class);
    Route::resource('/assignment', AssignmentController::class);
    Route::resource('/attachment', AttachmentController::class);
    Route::resource('/companies', CompanyController::class);
    Route::resource('/instructors', InstructorController::class);
    Route::resource('/jobtitles', JobtitleController::class);

    //HH
    Route::resource('students',StudentController::class);

    // NYL
    Route::resource('installments',InstallmentController::class);

    Route::get('/enrollment',[SaleController::class,'enrollment'])->name('enrollment');

    Route::post('/enrollmentsearch',[SaleController::class,'enrollmentsearch'])->name('enrollmentsearch');

});



Route::post('/sectionsorting_modernize',[SectionController::class, 'sectionsorting_modernize'])->name('sectionsorting_modernize');

// Backend Login
Route::get('/backside/login',[LoginController::class, 'backendLogin'])->name('backside.login');
Route::post('backsidelogin_data',[LoginController::class,'backsidelogin_store'])->name('backside_login');

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
Route::post('/questionstore',[AccountController::class, 'questionstore'])->name('questionstore');
Route::get('/questionnoti',[AccountController::class,'questionnoti'])->name('questionnoti');
Route::get('/questionshownoti',[AccountController::class,'questionshownoti'])->name('questionshownoti');
Route::post('/answerquestion',[AccountController::class,'answerquestion'])->name('answerquestion');
Route::get('/answernoti',[AccountController::class,'answernoti'])->name('answernoti');
Route::post('/questionreply',[AccountController::class,'questionreply'])->name('questionreply');
Route::get('/checkoutnoti',[AccountController::class,'checkoutnoti'])->name('checkoutnoti');

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
