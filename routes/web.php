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

Route::get('/', function () {return view('login');});


Auth::routes();
Route::get('/home'      , 'HomeController@index')->name('home');

Route::group(['prefix' => 'school'], function(){
    Route::get('schools'       ,   'SchoolController@index')->name('school.schools');
    Route::get('get'           ,   'SchoolController@get')->name('school.get');
    Route::get('add'           ,   'SchoolController@add')->name('school.add');
    Route::post('store'        ,   'SchoolController@store')->name('school.store');
    Route::get('edit/{id}'     ,   'SchoolController@edit')->name('school.edit');
    Route::post('update'       ,   'SchoolController@update')->name('school.update');
    Route::post('delete'       ,   'SchoolController@destroy')->name('school.delete');
});

Route::group(['prefix' => 'student'], function(){
    Route::get('students'      ,   'StudentController@index')->name('student.students');
    Route::get('get'           ,   'StudentController@get')->name('student.get');
    Route::get('add'           ,   'StudentController@add')->name('student.add');
    Route::post('store'        ,   'StudentController@store')->name('student.store');
    Route::get('edit/{id}'     ,   'StudentController@edit')->name('student.edit');
    Route::post('update'       ,   'StudentController@update')->name('student.update');
    Route::post('delete'       ,   'StudentController@destroy')->name('student.delete');
});