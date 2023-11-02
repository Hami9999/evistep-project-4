<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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
Route::post('add-teacher',[TeacherController::class, 'store']);
Route::put('update-teacher/{teacher}',[TeacherController::class, 'updateTeacher']);
Route::delete('delete-teacher/{teacher}',[TeacherController::class, 'destroy']);
Route::post('add-student',[StudentController::class, 'store']);
Route::put('update-student/{student}',[StudentController::class, 'updateStudent']);
Route::delete('delete-student/{student}',[StudentController::class, 'destroy']);
Route::post('groups',[GroupController::class, 'index']);
Route::get('groups/{group}',[GroupController::class, 'show']);
Route::post('subjects',[SubjectController::class, 'index']);
Route::get('subjects/{subject}',[SubjectController::class, 'show']);
