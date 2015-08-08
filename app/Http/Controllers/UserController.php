<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class UserController extends Controller
{
    /**
     * The method to display the login page
     *
     * @return Response
     */
    public function getLogin()
    {
        //Loading and returning the login view
        return view('auth.login');
    }

    /**
     * The method to post the login page
     *
     * @return Response
     */
    public function postLogin(Request $request)
    {
        //validation rules
        $v = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

        //Checking validation outcome
        if ($v->fails()) {
            //validation failed
            return redirect()->action('UserController@getRegister');
        } else {
            /**
             * Validation passed
             * Attempting to authenticate user
             */
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 1])) {
                //Authentication successfull
                return redirect()->route('home');
            } else {
                //Authentication failed
                return redirect()->action('UserController@getRegister');
            }
        }
    }

    /**
     * The method to display the registration page
     *
     * @return Response
     */
    public function getRegister()
    {
        //Loading and returning the registration view
        return view('auth.register');
    }

    /**
     * The method to post the registration page
     *
     * @return Response
     */
    public function postRegister(Request $request)
    {
        //validation rules
        $v = Validator::make($request->all(), 
            [
                'title' => '',
                'first_name' => '',
                'last_name' => '',
                'dob' => '',
                'address' => '',
                'town' => '',
                'county' => '',
                'postcode' => '',
                'mob_no' => '',
                'tel_no' => '',
                'all_locations' => '',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirm' => '',
                'role' => ''
            ]);

        //Checking validation outcome
        if ($v->fails()) {
            //Validation failed
            return redirect()->route('home');
        } else {
            /**
             * Validation passed
             */

            //Validation code
            $code = ''; //Need to update this to make a random string with 60 char length

            //Creating the user record
            $user = App\User::create(
                [
                'email' => $request->email,
                'password' => $request->password, //Need to hash this password
                'code' => $code,
                'active' => $, //Do I really need this? default value
                'role' => $request->role
                ]);

            $role = $request->role;

            //If statement to determine the user role
            if ($role == 'learner') {
                //Creating the learner record if the user role is learner

            } elseif ($role == 'instructor') {
                //Creating the instructor record if the user role is instructor
                
            }
        }
    }

    /**
     * The method to activate the user account
     */
    public function getActivate($code)
    {
        //
    }

    public function getLogout()
    {
        //Logs out the user
        Auth::logout();

        //Redirects the user to home page after logging out
        return redirect()->route('home');

    }

}
