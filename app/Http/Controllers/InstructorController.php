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
    }

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
                return redirect()->action('InstructorController@getIndex')->with('status', 'No instructor profile found!');
            }
        } else {
            return redirect()->action('InstructorController@getIndex');
        }
        
    }
}
