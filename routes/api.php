<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiResourceController;


Route::get('api-getdata',[ApiController::class,'getData']);
Route::post('api-adddata',[ApiController::class,'addData']);
Route::put('api-updatedata/{id}',[ApiController::class,'updateData']);
Route::delete('api-deletedata/{id}',[ApiController::class,'deleteData']);
Route::get('api-searchdata/{name}',[ApiController::class,'searchData']);
Route::post('api-adddata-validation',[ApiController::class,'validateData']);

Route::apiResource('api-resource',ApiResourceController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
