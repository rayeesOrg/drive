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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

//Routes for all methods in the UserController - RESTful controller
Route::controller('user', 'UserController');

//Routes for all methods in the InstructorController - RESTful controller
Route::controller('instructor', 'InstructorController');


Route::group( ['middleware' => 'learner'], function()
{
	//Routes for all methods in the InstructorController - RESTful controller
	Route::controller('review', 'ReviewController');

});