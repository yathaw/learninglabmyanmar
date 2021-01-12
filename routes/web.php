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
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CompanyProfileController;


//KYW
use App\Http\Controllers\BackendController;

// NYL
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstallmentController;

// YTMN
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;


//HH
use App\Http\Controllers\Auth\LoginController;

// YTMN
use App\Http\Controllers\Auth\RegisterController;

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
Route::post('searchcourse_bysubcategoryid',[FrontendController::class, 'searchcourse_bysubcategoryid'])->name('searchcourse_bysubcategoryid');


Route::post('searchmystudying',[FrontendController::class, 'searchmystudying'])->name('searchmystudying');

Route::post('wishlist_search',[FrontendController::class, 'wishlist_search'])->name('wishlist_search');

Route::post('wishlist_save',[FrontendController::class, 'wishlist_save'])->name('wishlist_save');

Route::post('removewishlist',[FrontendController::class, 'removewishlist'])->name('removewishlist');

Route::get('/course/{id}',[FrontendController::class, 'coursedetail'])->name('course');

Route::get('cart',[FrontendController::class, 'addtocart'])->name('cart');

Route::post('course_sale',[FrontendController::class, 'course_sale'])->name('course_sale');


Route::get('instructors',[FrontendController::class, 'instructors'])->name('instructors');

Route::get('/instructor/{id}',[FrontendController::class, 'instructordetail'])->name('instructor');
Route::get('/cours/catégorie/{id}',[FrontendController::class, 'coursebyCategory'])->name('cours/catégorie');
Route::get('/cours/sous-catégorie/{id}',[FrontendController::class, 'coursebySubcategory'])->name('cours/sous-catégorie');

Route::get('timeline',[FrontendController::class, 'timeline'])->name('timeline');
Route::get('pricing',[FrontendController::class, 'pricing'])->name('pricing');






//Honey
Route::get('business_info',[FrontendController::class,'business_info'])->name('business_info');
Route::post('business_store',[FrontendController::class,'business_store'])->name('business.store');

Route::get('instructor_info',[FrontendController::class,'instructor_info'])->name('instructor_info');
Route::post('instructor_store',[FrontendController::class,'instructor_store'])->name('instructor.store');
Route::post('login_data',[LoginController::class,'login_store'])->name('frontend_login');

Route::post('signup',[RegisterController::class,'process_signup'])->name('signup');
Route::get('reg_step',[RegisterController::class,'reg_step'])->name('reg_step');
Route::post('instructor_reg',[RegisterController::class,'process_instructor_reg'])->name('instructor_reg');
Route::post('company_reg',[RegisterController::class,'process_company_reg'])->name('company_reg');

Route::get('verify',[RegisterController::class,'verify_user'])->name('verify.user');

// ------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Backend (Admin) Frame
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'role:Admin|Developer|Business|Instructor', 'prefix' => 'backside', 'as' => 'backside.'], function(){
    Route::resource('/course', CourseController::class);


    Route::resource('/category',CategoryController::class);
    Route::resource('/subcategory',SubcategoryController::class);
    Route::resource('/sale', SaleController::class);
    Route::get('approve/{id}',[CourseController::class,'approve'])->name('course.approve');
    Route::get('course_search',[CourseController::class, 'course_search'])->name('course_search');


//NYL 
    Route::post('remove_sale_course',[SaleController::class,'remove_sale_course'])->name('remove_sale_course');

    Route::resource('/section', SectionController::class);
    Route::get('sectionshow/{id}',[SectionController::class,'sectionshow'])->name('sectionshow');
    //KYW
    Route::get('/section/{section}/edit',[SectionController::class,'edit'])->name('sectionedit');
    Route::post('/section/getcontenttype',[SectionController::class,'getcontenttype'])->name('getcontenttype');
    Route::post('/getinstructor',[SectionController::class,'getinstructor'])->name('getinstructor');
    Route::post('/sectionupdate/{id}',[BackendController::class,'sectionupdate'])->name('sectionupdate');

    Route::resource('/instructors', InstructorController::class);

    Route::get('/course/{id}/section',[SectionController::class, 'index'])->name('sectionlist');
    
    Route::resource('/content', ContentController::class);
    Route::post('/section/getsectionid',[ContentController::class,'getsectionid'])->name('getsectionid');
    Route::post('/content/getcontentid',[ContentController::class,'getcontentid'])->name('getcontentid');
    Route::post('/content/getlesson',[ContentController::class,'getlesson'])->name('getlesson');
    Route::post('/content/getcontenttype',[ContentController::class,'getcontenttype'])->name('getcontenttype');
    Route::delete('/contentdelete/{id}',[BackendController::class,'contentdelete'])->name('contentdelete');
    Route::post('/contentupdate/{id}',[BackendController::class,'contentupdate'])->name('contentupdate');


    Route::resource('/lesson', LessonController::class);
    Route::resource('/assignment', AssignmentController::class);
    Route::resource('/attachment', AttachmentController::class);



    /*Route::get('/enrollment',[SaleController::class,'enrollment'])->name('enrollment');

    Route::post('/enrollmentsearch',[SaleController::class,'enrollmentsearch'])->name('enrollmentsearch');
    */
    //YTMN
    Route::resource('/questions',QuestionController::class);
    Route::resource('/answer',AnswerController::class);
    Route::resource('/quiz',QuizController::class);
    Route::resource('/test',TestController::class);
    Route::post('/test/update/{id}',[TestController::class, 'update'])->name('test.update');
    Route::post('/quiz/update/{id}',[QuizController::class, 'update'])->name('quiz.update');



    //ALS
    Route::get('/enrollment',[SaleController::class,'enrollment'])->name('enrollment');

    Route::get('/enrollmentsearch',[SaleController::class,'enrollmentsearch'])->name('enrollmentsearch');

    Route::get('/coursefilter',[SaleController::class,'coursefilter'])->name('coursefilter');

});
//KKS
Route::group(['middleware' => 'role:Admin|Developer', 'prefix' => 'backside', 'as' => 'backside.'], function(){

    Route::resource('/companies', CompanyController::class);
    Route::resource('/jobtitles', JobtitleController::class);

    //HH
    Route::resource('students',StudentController::class);

    
    // NYL
    Route::resource('installments',InstallmentController::class);
    
});

    
Route::group(['middleware' => 'role:Admin', 'prefix' => 'backside', 'as' => 'backside.'], function(){
    Route::get('/signupnoti',[AccountController::class,'signupnoti'])->name('signupnoti');
    Route::get('/removesignupnoti',[AccountController::class,'removesignupnoti'])->name('removesignupnoti');
});

//HH
Route::get('account_remove',[InstructorController::class,'account_remove'])->name('account_remove');

Route::get('instructor_student/{id}',[InstructorController::class,'instructor_studentlist'])->name('instructor_studentlist');

Route::get('company_instructor/{id}',[CompanyController::class,'instructor_list'])->name('instructor_list');

Route::get('remove_instructor/{id}',[CompanyController::class,'remove_instructor'])->name('remove_instructor');

Route::get('company_student/{id}',[CompanyController::class,'student_list'])->name('student_list');

Route::get('confirm_remove',[InstructorController::class,'confirm_remove'])->name('confirm_remove');


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

// YTMN
Route::post('lesson_user',[AccountController::class, 'lesson_user'])->name('lesson_user');
Route::post('lesson_state',[AccountController::class, 'lesson_state'])->name('lesson_state');


Route::post('/questionstore',[AccountController::class, 'questionstore'])->name('questionstore');
Route::get('/questionnoti',[AccountController::class,'questionnoti'])->name('questionnoti');
Route::get('/questionshownoti',[AccountController::class,'questionshownoti'])->name('questionshownoti');
Route::post('/answerquestion',[AccountController::class,'answerquestion'])->name('answerquestion');
Route::get('/answernoti',[AccountController::class,'answernoti'])->name('answernoti');
Route::post('/questionreply',[AccountController::class,'questionreply'])->name('questionreply');
Route::get('/checkoutnoti',[AccountController::class,'checkoutnoti'])->name('checkoutnoti');

// NYL
Route::get('collection',[AccountController::class, 'collection'])->name('collection');

Route::post('add_course_collection',[AccountController::class,'add_course_collection'])->name('add_course_collection');

Route::post('edit_course_collection',[AccountController::class,'edit_course_collection'])->name('edit_course_collection');

Route::post('update_course_collection',[AccountController::class,'update_course_collection'])->name('update_course_collection');



Route::post('store_course_collection',[AccountController::class,'store_course_collection'])->name('store_course_collection');


Route::get('wishlist',[AccountController::class, 'wishlist'])->name('wishlist');

Route::resource('collections',CollectionController::class);

Route::get('purchase_history',[AccountController::class, 'purchase_history'])->name('purchase_history');

Route::get('history_detial/{id}',[AccountController::class, 'history_detial'])->name('history_detial');


// Start Quiz 
Route::get('/startquiz/{id}',[AccountController::class, 'startquiz'])->name('startquiz');

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





// YTMN
Route::post('getinstructor_bycompanyid',[CourseController::class, 'getinstructor'])->name('getinstructor_bycompanyid');
Route::post('getquestion_bycourseid',[QuestionController::class, 'getquestion'])->name('getquestion_bycourseid');

Route::post('getsection_bycourseid',[QuizController::class, 'getsection'])->name('getsection_bycourseid');

Route::post('getquizzes_bytestid',[AccountController::class, 'getquiz'])->name('getquizzes_bytestid');
Route::post('storequiz',[AccountController::class, 'storequiz'])->name('storequiz');
Route::post('getscore_byresponseid',[AccountController::class, 'getscore'])->name('getscore_byresponseid');

Route::group(['middleware' => 'role:Student'], function(){
    Route::get('profile/{id}',[FrontendController::class,'profile'])->name('profile');
    Route::post('profileupdate',[FrontendController::class,'profileupdate'])->name('profileupdate');
    Route::get('accountchangepassword/{id}',[FrontendController::class,'accountchangepassword'])->name('accountchangepassword');
    Route::post('accountupdatepassword',[FrontendController::class,'accountupdatepassword'])->name('accountupdatepassword');

});

Route::group(['middleware' => 'role:Instructor'], function(){
    Route::get('instructorprofile/{id}',[FrontendController::class,'instructorprofile'])->name('instructorprofile');
    Route::get('instructorprofileedit/{id}',[FrontendController::class,'instructorprofileedit'])->name('instructorprofileedit');
    Route::post('instructorprofileupdate/{id}',[FrontendController::class,'instructorprofileupdate'])->name('instructorprofileupdate');

    Route::post('instructorchangepassword/{id}',[FrontendController::class,'instructorchangepassword'])->name('instructorchangepassword');

    Route::get('changepassword/{id}',[FrontendController::class,'changepassword'])->name('changepassword');
    Route::post('updatepassword/{id}',[FrontendController::class,'updatepassword'])->name('updatepassword');
});

Route::group(['middleware' => 'role:Business'], function(){
    Route::get('companyprofile/{id}',[CompanyProfileController::class,'companyprofile'])->name('companyprofile');
    Route::get('companyprofileedit/{id}',[CompanyProfileController::class,'companyprofileedit'])->name('companyprofileedit');
    Route::post('companyprofileupdate/{id}',[CompanyProfileController::class,'companyprofileupdate'])->name('companyprofileupdate');
    Route::post('companyprofilechangepassword/{id}',[CompanyProfileController::class,'companyprofilechangepassword'])->name('companyprofilechangepassword');
    Route::get('companychangepassword/{id}',[CompanyProfileController::class,'companychangepassword'])->name('companychangepassword');
    Route::post('companyupdatepassword/{id}',[CompanyProfileController::class,'companyupdatepassword'])->name('companyupdatepassword');
});
// //ALS
// Route::get('coursecount','CoursecountController@coursecount')->name('coursecount');
Route::get('coursecount',[CoursecountController::class, 'coursecount'])->name('coursecount');


// Route::get('revenuereport','CoursecountController@revenuereport')->name('revenuereport');
Route::get('revenuereport',[CoursecountController::class, 'revenuereport'])->name('revenuereport');

Route::get('/clear-cache-all', function() {

    Artisan::call('cache:clear');

  

    dd("Cache Clear All");

});

Route::get('certifikat', function () {
    return view('certificate');
});
