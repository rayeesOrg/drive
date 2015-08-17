<?php

namespace App\Http\Controllers;

use App\User;
use App\Instructor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstructorController extends Controller
{
    /**
     * Display a listing of all the instructors.
     *
     * @return Response
     */
    public function getIndex()
    {
        //All users who are instructors
        $instructors = User::with('instructor')->has('instructor')->get();

        //Returning the view with $instructors
        return view('instructor_list', ['instructors' => $instructors]);

    } //End of getIndex method

    /**
     * Display the instructor profile.
     *
     * @return Response
     */
    public function getProfile($id = Null)
    {
        if (isset($id)) {
            //All users who are instructors
            $instructor = User::with('instructor')->has('instructor')->where('active', 1)->where('user_id', $id)->get();

            if (count($instructor) > 0) {
                //Returning the view with $instructors
                return view('instructor_profile', ['instructor' => $instructor]);

            } else {
                //If no result, redirect the user to the instructor_list
                //Flashed data contains message and alert-class
                return redirect()->action('InstructorController@getIndex')->with('message', 'No instructor profile found!')->with('alert-class', 'alert-danger');

            } //End of if statement
        } else {
            //If no id provided, redirect the user to the instructor_list
            return redirect()->action('InstructorController@getIndex');

        } //End of if statement
    } //End of getProfile method
} //End of class
