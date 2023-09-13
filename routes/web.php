<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HttpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FlashSessionController;
use App\Http\Controllers\QeuryBuilderController;
use App\Http\Controllers\AjaxCrudController;
use App\Http\Controllers\RazorpayController;


Route::view('razorpay','razorpay');
Route::post('razorpay',[RazorpayController::class,'makeOrder'])->name('make.order');


Route::view('ajax-view','ajax-view');
Route::get('ajax-getdata',[AjaxCrudController::class,'index'])->name('getData');
Route::get('ajax-getdata/{id}',[AjaxCrudController::class,'getSingleData'])->name('getSingleData');
Route::post('ajax-adddata',[AjaxCrudController::class,'addData'])->name('addData');
Route::put('ajax-updatedata/{id}',[AjaxCrudController::class,'updateData'])->name('updateData');
Route::delete('ajax-deletedata/{id}',[AjaxCrudController::class,'deleteData'])->name('deleteData');



Route::get('query-builder',[QeuryBuilderController::class,'studentsList']);
Route::view('fileupload','fileupload');
Route::post('fileUpload',[UploadController::class,'fnFileUpload']);
Route::get('/flashsession',[FlashSessionController::class,'getFlashSession']);
Route::post('/flashsession',[FlashSessionController::class,'setFlashSession']);

Route::get('/user',[UserController::class,'viewLoad']);
Route::get('/',[UserController::class,'viewLoad']);

Route::get('/users',function(){
    return view('users');
});

Route::post('/users',[UserController::class,'submit']);

Route::get('/string',function(){
    return view('string');
});

Route::view('session','session');
Route::post('session',[SessionController::class,'userLogin']);
Route::view('profile','profile');

Route::get('login',function(){
    if(session()->has('userName')){
        return redirect('profile');
    }
    return redirect('session');
});

Route::get('logout',function(){
    if(session()->has('userName')){
        session()->pull('userName');
        return redirect('session');
    }
    return redirect('login');
});

Route::get('httprequest',[HttpController::class,'getData']);

Route::controller(StudentController::class)->group(function(){
    Route::get('student/all-students','allStudents')->name('allStudents');
    Route::get('student/','allStudents')->name('allStudents');
    Route::get('student/get-student/{id}','getStudent')->name('getStudent');
    Route::post('student/update-student/{id}','updateStudent')->name('updateStudent');
    Route::get('student/delete-student/{id}','deleteStudent')->name('deleteStudent');
    Route::post('student/add-student','addStudent')->name('addStudent');
    Route::get('student/when','whenData')->name('whenData');
    Route::get('student/chunk','chunkData')->name('chunkData');
    Route::view('student/add-student',"student/add-student");
    Route::get('student/show-students','showStudents')->name('showStudents');
    Route::get('/students','showData')->name('home');
    Route::get('/add','addData');
    Route::get('/update','updateData');
    Route::get('/delete/{id}','deleteData');
});

Route::get('/testing',TestController::class);


