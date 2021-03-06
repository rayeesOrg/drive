<?php

namespace App\Http\Controllers;

use App\User;
use App\Learner;
use App\Instructor;
use Validator;
use Hash;
use Mail;
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

    } //End of getLogin method

    /**
     * The method to post the login form
     *
     * @return Response
     */
    public function postLogin(Request $request)
    {
        //validation
        $v = Validator::make($request->all(), 
            [
                //Validation parameters
                'email' => 'required|email',
                'password' => 'required'
            ]);

        //Checking validation outcome
        if ($v->fails()) {
            /**
             * Validation failed
             * Redirecting back to the page with errors and inputs
             */
            return back()->withErrors($v)->withInput();

        } else {
            /**
             * Validation passed
             * Attempting to authenticate user
             */
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 1]))
            {
                //Authentication successfull
                return redirect()->intended('/')->with('status', 'Logged in!');

            } else {
                //Authentication failed
                return back()->with('status', 'Failed to log in!!'); //Need changing
            }
        } //End of if statement
    } //End of postLogin method

    /**
     * The method to display the registration page
     *
     * @return Response
     */
    public function getRegister()
    {
        //Loading and returning the registration view
        return view('auth.register');

    } //End of getRegister method

    /**
     * The method to post the registration form
     *
     * @return Response
     */
    public function postRegister(Request $request)
    {
        //validation
        $v = Validator::make($request->all(), 
            [
                //Validation parameters
                'title' => 'required|min:2|max:10',
                'first_name' => 'required|alpha|max:50',
                'last_name' => 'required|alpha|max:50',
                'dob' => 'date_format:Y/m/d', //Change this format in d/m/Y in here and in mySQL. d/m/Y format currently not being saved into db
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
                'all_locations' => 'required_if:role,instructor|max:60', //should this be required or not?
                'work_location' => 'required_if:role,instructor|max:20'
            ]);

        //Checking validation outcome
        if ($v->fails()) {
            /**
             * Validation failed
             * Redirecting back to the page with errors and inputs
             */
            return back()->withErrors($v)->withInput();

        } else {
            /**
             * Validation passed
             */

            //Random string to activate the account
            $code = str_random(60);

            //Creating the user record
            $user = User::create(
                [
                'email' => $request->email,
                'password' => Hash::make($request->password), //Hashing the password
                'code' => $code,
                'active' => 0,
                'role' => $request->role
                ]);

            //If statement to determine the user role
            if ($request->role == 'learner') {
                //Creating the learner record if the user role is learner
                $learner = new Learner(
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

                $create = User::find($user->user_id)->learner()->save($learner);

            } elseif ($request->role == 'instructor') {
                //Creating the instructor record if the user role is instructor
                $instructor = new Instructor(
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
                        'all_locations' => $request->all_locations,
                        'work_location' => $request->work_location
                    ]);

                $create = User::find($user->user_id)->instructor()->save($instructor);

            } //End of If statement

            //If the user is registered successfully
            if ($user AND $create) {
                //Send the activation code via e-mail
                Mail::send('emails.activate', ['user' => $user, 'create' => $create], function ($message) use ($user, $create) {
                    $message->to($user->email, $create->first_name)->subject('Account activation!');
                });

                //Redirect to a more suitable page
                return redirect()->route('home')->with('status', 'E-mail sent to the provided address'); //Need changing

                /*Need an else statement here*/
                
            } //End of If statement
        } //End of If statement
    } //End of postRegister method

    /**
     * The method to activate the user account
     */
    public function getActivate($code)
    {
        //Finding the user with the given code
        $activation = User::where('code', $code)->where('active', 0)->first();

        if ($activation) {
            //Updating the user record
            $activation->active = 1;
            $activation->code = '';
            $activation->save();

            //Account activated successfully
            return redirect()->action('UserController@getLogin')->with('status', 'Your account has been successfully activated. Please try to log in!');

        } else {

            //Account activation failed
            return redirect()->route('home')->with('status', 'Sorry, We were unable to activate your account!');

        } //End of if statement
    } //End of getActivate method

    /**
     * The method to log out the user
     */
    public function getLogout()
    {
        //Logs out the user
        Auth::logout();

        //Redirects the user to home page after logging out
        return redirect()->route('home')->with('status', 'You have been logged out!');

    } //End of getLogout method

    /**
     * The method to change password
     */
    public function getChangePassword() 
    {
        //Loading and returning the view
        return view('auth.password_change');

    } //End of getChangePassword method

    /**
     * The method to post the change password form
     */
    public function postChangePassword(Request $request) 
    {
        //validation
        $v = Validator::make($request->all(), 
            [
                //Validation parameters
                'password_old' => 'required',
                'password_new' => 'required|min:6|different:password_old|alpha_num',
                'password_confirm' => 'required|same:password_new'
            ]);

        //If statement
        if ($v->fails()) {
            /**
             * Validation failed
             * Redirecting back to the page with errors and inputs
             */
            return back()->withErrors($v)->withInput();

        } else {
            /**
             * Validation passed
             */

            //Current user
            $user = $request->user();

            if (Hash::check($request->password_old, $user->password))
            {
                //Password matches
                //Saving the new password
                $user->password = Hash::make($request->password_new);
                $user->save();

                //Redirects the user to home page after changing the password
                return redirect()->route('home')->with('status', 'Your password has been changed!');

            } else {
                //No Match
                return redirect()->route('home')->with('status', 'Wrong password');

            } //End of if statement
        } //End of if statement
    } //End of getChangePassword method

    /**
     * The method to reset password
     */
    public function getResetPassword() 
    {
        //

    } //End of getResetPassword method

    /**
     * The method to post the reset password form
     */
    public function postResetPassword(Request $request) 
    {
        //

    } //End of postResetPassword method
}
