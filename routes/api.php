<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\AuthController;

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

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('student/get'    ,   'StudentController@get')->name('student.get');
// });

Route::middleware('auth:sanctum')->group(function () {
    // our routes to be protected will go in here
    Route::resource('students', StudentController::class);
    // Route::get('student/get'    ,   'StudentController@get')->name('student.get');
});

// Route::post('/login', LoginController::class)->name('user.login');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);