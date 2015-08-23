<?php

namespace App\Http\Controllers;

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
    public function getIndex()
    {
        //Loading and returning the reviews view
        return view('review');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function postIndex(Request $request)
    {
        //
        // var_dump($request);
        // echo $request->star;
        // echo $request->review;

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
             * Creating the vehicle record
             */
            echo $request->star;
            echo $request->review;
        } //End of if statement
    }
}
