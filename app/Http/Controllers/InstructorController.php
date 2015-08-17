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
                //Flashed data contains message and alert-danger class
                return redirect()->action('InstructorController@getIndex')->with('message', 'No instructor profile found!')->with('alert-class', 'alert-danger');

            } //End of if statement
        } else {
            //If no id provided, redirect the user to the instructor_list
            return redirect()->action('InstructorController@getIndex');

        } //End of if statement
    } //End of getProfile method

    /**
     * Display the add vehicle form.
     *
     * @return Response
     */
    public function getAddVehicle()
    {
        //Returning the view
        return view('add_vehicle');
    }

    /**
     * Display the add vehicle form.
     *
     * @return Response
     */
    public function postAddVehicle(Request $request)
    {
        //validation
        $v = Validator::make($request->all(), 
            [
                //Validation parameters
                'reg_no' => 'required|alpha_num|min:2|max:15',
                'make' => 'required|max:25',
                'model' => 'required|max:25',
                'transmission' => 'required|in:automatic,manual'
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
            //Creating the learner record if the user role is learner
            // $vehicle = Vehicle::create(
            //     [
            //         'reg_no' => $request->reg_no,
            //         'make' => $request->make,
            //         'model' => $request->model,
            //         'transmission' => $request->transmission
            //     ]);

            // $create = Instructor::find($user->user_id)->learner()->save($vehicle);
        }
    }

} //End of class
