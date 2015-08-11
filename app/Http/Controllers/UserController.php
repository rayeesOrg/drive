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
            $user = User::create(
                [
                'email' => $request->email,
                'password' => Hash::make($request->password), //Hashing the password
                'code' => $code,
                'active' => 0, //Do I really need this? default value
                'role' => $request->role
                ]);

            $user_id = $user->user_id;

            // echo "Hello";
            // var_dump($user_id);
            // echo "$user_id";

            //If statement to determine the user role
            if ($request->role == 'learner') {
                //Creating the learner record if the user role is learner
                $create = Learner::create(
                    [
                        'user_id' => $user_id,
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

            } elseif ($request->role == 'instructor') {
                //Creating the instructor record if the user role is instructor
                $create = Instructor::create(
                    [
                        'user_id' => $user_id,
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

            } //End of If statement

            //If the user is registered successfully
            if ($user AND $create) {

                Mail::send('emails.activate', ['user' => $user, 'create' => $create], function ($message) use ($user, $create) {
                    //
                    $message->to($user->email, $create->first_name)->subject('Account activation!');
                });

                //Send the activation code via e-mail
                return redirect()->route('home');
            }

            // return redirect()->action('UserController@getRegister');
            
        } //End of If statement

    } //End of postRegister method

    /**
     * The method to activate the user account
     */
    public function getActivate($code)
    {
        //
        // echo $code;
        $activation = User::where('code', $code)->where('active', 0)->first();

        if ($activation) {
            $activation->active = 1;
            $activation->code = '';
            $activation->save();

            echo "You can now log in";
        } else {
            echo "does not exist";
        }

    }  //End of getActivate method

    /**
     * The method to log out the user
     */
    public function getLogout()
    {
        //Logs out the user
        Auth::logout();

        //Redirects the user to home page after logging out
        return redirect()->route('home');

    } //End of getLogout method

}
