<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\RoomController;
use App\Interfaces\Http\Controllers\CourseController;
use App\Interfaces\Http\Controllers\TeamController;
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

Route::post('teams', [TeamController::class, 'create']);
Route::get('teams/{id}', [TeamController::class, 'find']);
Route::put('teams/{id}', [TeamController::class, 'update']);
Route::delete('teams/{id}', [TeamController::class, 'delete']);
Route::get('teams', [TeamController::class, 'list']);
