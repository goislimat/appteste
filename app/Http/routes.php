<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/create', ['uses' => 'UserController@create', 'as' => 'user.create']);
Route::post('user', ['uses' => 'UserController@store', 'as' => 'user.store']);

Route::resource('course', 'CourseController');

Route::resource('subject', 'SubjectController');