<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
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
Route::get('about', function () {
    return view('about');
});

Route::get('feedback', function () {
    return view('feedback');
});
Route::post('feedback-add',[FeedbackController::class,'create']);


Route::get('contact', function () {
    return view('contact');
});

Route::post('contact-add',[ContactController::class,'create']);

Route::get('contact-all', [ContactController::class,'index']);

Route::get('contact-delete/{id}',[ContactController::class,'destroy']);

Route::get('contact-edit/{id}',[ContactController::class,'edit']);

Route::post('contact-update',[ContactController::class,'update']);



//Route::post('contact-delete','ContactController@destroy');
