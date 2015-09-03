<?php

namespace App\Http\Controllers;

use App\Review;
use App\Instructor;

use Illuminate\Http\Request;

use Validator;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getAddReview($instructor_id)
    {
        $instructor = Instructor::where('Instructor_id', $instructor_id)->first();

        //Loading and returning the review view
        return view('review', ['instructor' => $instructor]);
    } //End of getReview method

    /**
     * Post the review form.
     *
     * @return Response
     */
    public function postAddReview(Request $request)
    {
        //validation
        $v = Validator::make($request->all(), 
            [
                //Validation parameters
                'star' => 'required|integer|in:1,2,3,4,5',
                'review' => 'required|string',
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
             * Checking if the learner has already submitted a review for the instructor
             */
            $no_of_review = Review::where('learner_id', $request->user()->learner->learner_id)->where('Instructor_id', $request->instructor_id)->count();

            if ($no_of_review == 0) {
                //If no review has submitted for the selected instructor by the current user
                //Create the review
                $review = Review::create(
                    [
                        'learner_id' => $request->user()->learner->learner_id,
                        'instructor_id' => $request->instructor_id,
                        'rating' => $request->star,
                        'review' => $request->review
                    ]);

                if ($review) {
                    //If review is created successfully
                    //Send an e-mail to the instructor
                    
                    /*Write an e-mail function here*/

                    //Redirect the user
                    return redirect()->route('home')->with('message', 'Review added')->with('alert-class', 'alert-success');
                } else {
                    //If creating review was unsuccessfull
                    return redirect()->route('home')->with('message', 'Review could not be added')->with('alert-class', 'alert-danger');
                } //End of if statement
                
            } else {
                //If review has been submitted previously for the selected instructor by the current user
                return redirect()->route('home')->with('message', 'You have already submitted a review for this instructor!')->with('alert-class', 'alert-danger');

            } //End of if statement
        } //End of if statement
    } //End of postReview method
} //End of Class
