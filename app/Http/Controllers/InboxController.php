<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    /**
     * Display the inbox.
     *
     * @return Response
     */
    public function getIndex()
    {
        //
        return view('inbox');
    }

    /**
     * Send the message.
     *
     * @return Response
     */
    public function postSendMessage(Request $request)
    {
        //validation
        $v = Validator::make($request->all(), 
            [
                //Validation parameters
                'message' => 'required|max:250'
            ]);

        //Checking validation outcome
        if ($v->fails()) {
            /**
             * Validation failed
             * Redirecting back to the page with errors and inputs
             */
            return back()->withErrors($v)->withInput();

        } else {
            echo "Hi";
        }
    }

}
