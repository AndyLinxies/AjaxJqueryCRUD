<?php

use App\Http\Controllers\StudentController;
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

Route::get('/students', [StudentController::class,'index']);

Route::get('/readStudents', [StudentController::class,'readStudents']);

Route::post('/students', [StudentController::class,'store']);

//edit
Route::get('/editStudents/{id}', [StudentController::class,'editStudents']);

//update
Route::put('/updateStudents/{id}',[StudentController::class,'updateStudents']);

//delete
Route::delete('/deleteStudents/{id}', [StudentController::class,'destroy']);