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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/**Register Student */
Route::get('studentportal',[App\Http\Controllers\StaffAndStudent\RegisterController::class,'index'])->name('RegisterPortal');
Route::post('register',[App\Http\Controllers\StaffAndStudent\RegisterController::class,'register'])->name('Register');

Route::get('loginportal',[App\Http\Controllers\StaffAndStudent\LoginController::class,'index'])->name('LoginPortal');
Route::post('login',[App\Http\Controllers\StaffAndStudent\LoginController::class,'login'])->name('Login');



Route::group(['middleware' => 'Admin'],function()
{
    Route::get('dashboard',[App\Http\Controllers\StaffAndStudent\LoginController::class,'dashboard'])->name('dashboard');
    Route::get('logout',[App\Http\Controllers\StaffAndStudent\LoginController::class,'logout'])->name('logout');
    Route::get('subject',[App\Http\Controllers\StaffMembers\QuizController::class,'index'])->name('SubjectList');

    Route::get('createSubject',[App\Http\Controllers\StaffMembers\QuizController::class,'create'])->name('createSubjectForm');
    Route::post('createSubject',[App\Http\Controllers\StaffMembers\QuizController::class,'addSubject'])->name('addSubject');
    Route::get('deleteSubject',[App\Http\Controllers\StaffMembers\QuizController::class,'delete'])->name('deleteSubject');
    
    // test list
    Route::get('testList',[App\Http\Controllers\StaffMembers\QuizController::class,'testList'])->name('TestList');
    Route::post('addTest',[App\Http\Controllers\StaffMembers\QuizController::class,'addTest'])->name('addTest');
    
    Route::get('createQuiz',[App\Http\Controllers\StaffMembers\QuizController::class,'createQuiz'])->name('createQuiz');
    Route::post('addQuiz',[App\Http\Controllers\StaffMembers\QuizController::class,'addQuiz'])->name('addQuiz');
    
    Route::post('testStatus',[App\Http\Controllers\AjaxCallController::class,'testStatus'])->name('testStatus');
    Route::post('searching',[App\Http\Controllers\AjaxCallController::class,'search'])->name('searchSUB');

});

Route::get('profile',[App\Http\Controllers\StaffAndStudent\LoginController::class,'profile'])->name('profile');
Route::post('profileupdate',[App\Http\Controllers\StaffAndStudent\LoginController::class,'profileupdate'])->name('profileupdate');



/** Student Routes */

Route::group(['middleware' => 'student'],function()
{

Route::get('Subject',[App\Http\Controllers\Student\SubjectController::class,'index'])->name('SubjectListS');
Route::get('TestList',[App\Http\Controllers\Student\SubjectController::class,'testList'])->name('TestListS');

Route::get('Quiz',[App\Http\Controllers\Student\SubjectController::class,'quizIndex'])->name('Quiz');
Route::post('submitQuiz',[App\Http\Controllers\Student\SubjectController::class,'submitQuiz'])->name('submitQuiz');
Route::get('score',[App\Http\Controllers\Student\SubjectController::class,'score'])->name('score');

Route::get('result',[App\Http\Controllers\Student\SubjectController::class,'result'])->name('result');
});