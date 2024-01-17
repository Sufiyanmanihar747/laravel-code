<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::middleware(['auth'])->group(function()
{
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('students' , StudentController::class);
    Route::resource('teachers', TeacherController::class)->middleware('is_admin');
});

Route::get('/getteachers/{courseId}', [StudentController::class, 'getTeachers']);
Route::get('/getstudents/{courseId}', [TeacherController::class, 'getStudents']);
