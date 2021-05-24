<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\RoomController;
use App\Interfaces\Http\Controllers\CourseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('rooms', [RoomController::class, 'create']);
Route::get('rooms/{id}', [RoomController::class, 'find']);
Route::put('rooms/{id}', [RoomController::class, 'update']);
Route::delete('rooms/{id}', [RoomController::class, 'delete']);
Route::get('rooms', [RoomController::class, 'list']);

Route::post('courses', [CourseController::class, 'create']);
Route::get('courses/{id}', [CourseController::class, 'find']);
Route::put('courses/{id}', [CourseController::class, 'update']);
Route::delete('courses/{id}', [CourseController::class, 'delete']);
Route::get('courses', [CourseController::class, 'list']);
