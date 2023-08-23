<?php

use App\Http\Controllers\Api\studentContraller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// This is my first run

/*Route::get('students',function(){
    return 'This is Student api';
});*/

// calling our api function

Route::get('studentsApi',[studentContraller::class,'index']);
Route::post('studentsApi',[studentContraller::class,'store']);
Route::get('studentsApi/{id}',[studentContraller::class,'showById']);
Route::put('studentsApi/{id}/update',[studentContraller::class,'updateById']);