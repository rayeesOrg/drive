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

            $auth = Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
                ]);
            //validation passed
            if ($auth) {
                //Authentication passed
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
    public function postRegister()
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
