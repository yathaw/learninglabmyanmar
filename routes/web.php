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

//ALS
Route::get('coursecount','CoursecountController@coursecount')->name('coursecount');
Route::get('revenuereport','CoursecountController@revenuereport')->name('revenuereport');