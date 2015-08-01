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
Route::get('/', function () { return view('index'); });

//Routes for all methods in the UserController which is a RESTful controller
Route::controller('user', 'UserController');

//Route to get login page
// Route::get('login', function () {
//     return view('login');
// });

//Route to get registration page
// Route::get('register', function () {
//     return view('registration');
// });
