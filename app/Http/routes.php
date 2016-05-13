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

    Route::resource('subject.project', 'ProjectController');

    //Route::resource('subject.project.file', 'ProjectFileController');

    Route::group(['prefix' => 'subject'], function() {
        Route::get      ('{id?}/create',                                    ['uses' => 'SubjectController@create',      'as' => 'course.subject.create']);
        Route::get      ('{id}/all/{teacher?}',                             ['uses' => 'SubjectController@all',         'as' => 'subject.all']);

        Route::get      ('{id}/enroll',                                     ['uses' => 'EnrollController@create',       'as' => 'enroll.new']);
        Route::post     ('enroll',                                          ['uses' => 'EnrollController@store',        'as' => 'enroll.store']);
        Route::get      ('{id}/new/teacher',                                ['uses' => 'EnrollController@newTeacher',   'as' => 'enroll.new.teacher']);
        Route::delete   ('{subjectId}/user/{userId}/{yearSemester}',        ['uses' => 'EnrollController@destroy',      'as' => 'enroll.destroy']);

        //Route::get      ('{subject}/project/{project}/file', 'FileEntryController@index');
        Route::get      ('{subject}/project/{project}/file/get/{filename}', ['uses' => 'ProjectFileController@get',     'as' => 'getfile']);
        Route::post     ('{subject}/project/{project}/file/add',            ['uses' => 'ProjectFileController@add',     'as' => 'addfile']);
    });


});


Route::auth();

Route::get('home', ['uses' => 'HomeController@index', 'as' => 'home']);
