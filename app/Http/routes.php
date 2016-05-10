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
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('user', 'UserController');

    Route::resource('course', 'CourseController');

    Route::resource('subject', 'SubjectController');

    Route::resource('subject.project', 'ProjectController');
});


Route::auth();

Route::get('home', ['uses' => 'HomeController@index', 'as' => 'home']);
