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
            return back()->withErrors($v)->withInput();
        } else {
            /**
             * Validation passed
             * Attempting to authenticate user
             */
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 1]))
            {
                //Authentication successfull
                return redirect()->route('home');
            } else {
                //Authentication failed
                return redirect()->action('UserController@getRegister'); //Need changing
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
                'title' => 'required|min:2|max:10',
                'first_name' => 'required|alpha|max:50',
                'last_name' => 'required|alpha|max:50',
                'dob' => 'date',
                'address' => 'required|max:50',
                'town' => 'required|alpha|max:25',
                'county' => 'alpha|max:25',
                'postcode' => 'required|max:15',
                'mob_no' => 'required|digits_between:10,15',
                'tel_no' => 'digits_between:10,15',
                'email' => 'required|email|max:50|unique:users,email',
                'password' => 'required|min:6|alpha_num',
                'password_confirm' => 'required|same:password',
                'role' => 'required|in:learner,instructor',
                'all_locations' => 'required_if:role,instructor' //should this be required or not?
            ]);

        //Checking validation outcome
        if ($v->fails()) {
            //Validation failed
            return back()->withErrors($v)->withInput();
        } else {
            /**
             * Validation passed
             */

            //Validation code
            $code = str_random(60); //Need to update this to make a random string with 60 char length

            //Creating the user record
            $user = App\User::create(
                [
                'email' => $request->email,
                'password' => Hash::make($request->password), //Hashing the password
                'code' => $code,
                'active' => 0, //Do I really need this? default value
                'role' => $request->role
                ]);

            $role = $request->role;

            //If statement to determine the user role
            if ($role == 'learner') {
                //Creating the learner record if the user role is learner
                $learner = App\Learner::create(
                    [
                        'title' => $request->title,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'dob' => $request->dob,
                        'address' => $request->address,
                        'town' => $request->town,
                        'county' => $request->county,
                        'postcode' => $request->postcode,
                        'mob_no' => $request->mob_no,
                        'tel_no' => $request->tel_no
                    ]);

            } elseif ($role == 'instructor') {
                //Creating the instructor record if the user role is instructor
                $learner = App\Instructor::create(
                    [
                        'title' => $request->title,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'dob' => $request->dob,
                        'address' => $request->address,
                        'town' => $request->town,
                        'county' => $request->county,
                        'postcode' => $request->postcode,
                        'mob_no' => $request->mob_no,
                        'tel_no' => $request->tel_no,
                        'all_locations' => $request->all_locations
                    ]);
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

    /**
     * The method to log out the user
     */
    public function getLogout()
    {
        //Logs out the user
        Auth::logout();

        //Redirects the user to home page after logging out
        return redirect()->route('home');

    }

}
