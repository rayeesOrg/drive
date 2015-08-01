<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('login');
    }

    /**
     * The method to post the login page
     *
     * @return Response
     */
    public function postLogin()
    {
        //
    }

    /**
     * The method to display the registration page
     *
     * @return Response
     */
    public function getRegister()
    {
        //Loading and returning the registration view
        return view('registration');
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

}
