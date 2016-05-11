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
    Route::get('user/{id?}/create', ['uses' => 'UserController@create', 'as' => 'course.user.create']);

    Route::resource('course', 'CourseController');

    Route::resource('subject', 'SubjectController');
    Route::get('subject/{id?}/create', ['uses' => 'SubjectController@create', 'as' => 'course.subject.create']);
    Route::get('subject/{id}/all', ['uses' => 'SubjectController@all', 'as' => 'subject.all']);

    Route::resource('subject.project', 'ProjectController');

    Route::get('subject/{id}/enroll', ['uses' => 'EnrollController@create', 'as' => 'enroll.new']);
    Route::post('subject/enroll', ['uses' => 'EnrollController@store', 'as' => 'enroll.store']);
});


Route::auth();

Route::get('home', ['uses' => 'HomeController@index', 'as' => 'home']);
