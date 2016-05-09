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
    return view('login');
});

Route::post('login', function() {
    //inica a seção mandando para a página de boas vindas
});

Route::resource('user', 'UserController');

Route::resource('course', 'CourseController');

Route::resource('subject', 'SubjectController');

Route::resource('project', 'ProjectController');