<?php

namespace App\Http\Controllers;

use App\User;
use App\Instructor;
use App\Review;
use App\Vehicle;

use Illuminate\Http\Request;

use Validator;
use Auth;
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
        //All users who are instructors and active
        $instructors = User::with('instructor')->has('instructor')->where('active', 1)->get();

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
            //The instructor with the given user_id
            $instructor = User::with('instructor')->has('instructor')->where('active', 1)->find($id);

            if (count($instructor) == 1) {

                //Instructor_id of the instructor
                $instructor_id = $instructor->instructor->instructor_id;

                //All reviews of the instructor
                $reviews = Instructor::find($instructor_id)->reviews()->orderBy('created_at', 'desc')->paginate(2);

                $reviews->setPath('/drive/instructor/profile/83/url');

                //Counting the number of reviews wrote by the current learner for the instructor
                // $no_of_review = Review::where('learner_id', Auth::user()->learner->learner_id)->where('Instructor_id', $instructor_id)->count();

                //Counting total number of reviews of the instructor
                $total_reviews = Instructor::find($instructor_id)->reviews()->count();

                //
                $avg_rating = Instructor::find($instructor_id)->reviews()->avg('rating');
            
                //Returning the view with $instructors
                return view('instructor_profile', ['instructor' => $instructor, 'reviews' => $reviews, 'total_reviews' => $total_reviews, 'avg_rating' => $avg_rating]);

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
    } //End of getAddVehicle method

    /**
     * Post the add vehicle form.
     *
     * @return Response
     */
    public function postAddVehicle(Request $request)
    {
        //validation
        $v = Validator::make($request->all(), 
            [
                //Validation parameters
                'reg_no' => 'required|min:2|max:15',
                'make' => 'required|max:25',
                'model' => 'required|max:25',
                'transmission' => 'required|in:Automatic,Manual'
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
             * Creating the vehicle record
             */
            $vehicle = Vehicle::create(
                [
                    'instructor_id' => $request->user()->instructor->instructor_id,
                    'reg_no' => $request->reg_no,
                    'make' => $request->make,
                    'model' => $request->model,
                    'transmission' => $request->transmission
                ]);

            if ($vehicle) {
                return redirect()->action('InstructorController@getIndex')->with('message', 'Vehicle added!')->with('alert-class', 'alert-info');
            } else {
                return redirect()->action('InstructorController@getIndex')->with('message', 'Unable to add vehicle')->with('alert-class', 'alert-danger');
            } //End of if statement
        } //End of if statement
    } //End of postAddVehicle method

    /**
     * Display the add image form.
     *
     * @return Response
     */
    public function getAddImage()
    {
        //Returning the view
        return view('instructor.add_image');
    } //End of getAddImage method

    /**
     * Post the add image form.
     *
     * @return Response
     */
    public function postAddImage(Request $request)
    {
        $images = $request->file('images');
        //Counting uploaded images
        $file_count = count($images);
        //start count how many uploaded
        $uploadcount = 0;

        foreach ($images as $image) {
            //validation
            $v = Validator::make(array('image' => $image), 
                [
                    //Validation parameters
                    'image' => 'required|image'
                ]);

            if ($v->fails()) {
                return back()->withErrors($v)->withInput();
            } else {
                //Directory to upload the images to
                $destinationPath = 'items/user_uploads';
                //\creating a random name
                $random_name = str_random(10);
                //Image extension
                $extension = $image->getClientOriginalExtension();
                //Assigning a random filename
                $filename = $random_name.'.'.$extension;;
                $upload_success = $image->move($destinationPath, $filename);
                $uploadcount ++;
            }
        }

        if ($uploadcount == $file_count) {
            echo "Fully uploaded";
        } else {
            return back()->withErrors($v)->withInput();
        }

    } //End of postAddImage method
} //End of class