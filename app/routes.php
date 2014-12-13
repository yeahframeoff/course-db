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
    $theOnly = ['only' => ['index', 'show', 'store', 'update', 'destroy']];
    Route::resource('teachers', 'TeacherController', $theOnly);
    Route::resource('positions', 'PositionController', $theOnly);
    Route::resource('subjects', 'SubjectController', $theOnly);
    Route::resource('curriculums', 'CurriculumController', $theOnly);
});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
    return View::make('index');
});