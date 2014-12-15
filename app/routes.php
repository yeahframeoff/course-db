<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});



Route::group(['prefix' => 'api'], function() {
    $theOnly = ['only' => ['index', 'store', 'update', 'destroy']];
    Route::resource('teachers', 'TeacherController', $theOnly);
    Route::resource('positions', 'PositionController', $theOnly);
    Route::resource('subjects', 'SubjectController', $theOnly);
    Route::resource('curriculums', 'CurriculumController', $theOnly);
    Route::resource('curriculum_types', 'CurriculumTypeController', $theOnly);
    Route::controller('custom', 'CustomController');
});

App::missing(function($e)
{
    return View::make('index');
});