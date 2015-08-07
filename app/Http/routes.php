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

// Route to get home page
// Route::get('/', function () { 
// 	return view('index'); 
// });

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

//Routes for all methods in the UserController - RESTful controller
Route::controller('user', 'UserController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


//Route to get login page
// Route::get('login', function () {
//     return view('login');
// });

//Route to get registration page
// Route::get('register', function () {
//     return view('registration');
// });
