<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Conversation;
use App\Message;
use App\Participant;
use DB;

use Validator;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    public function __construct()
    {
        /**
         * Middleware to allow access to only logged in users
         */
        $this->middleware('auth');
    }

    /**
     * Display the inbox.
     *
     * @return Response
     */
    public function getIndex()
    {
        $user_id = Auth::user()->user_id;
        $messages = Participant::where('user_id', $user_id)->with('conversation.messages', 'user')->get();
        

        // $messages = $user->with('conversations')->has('conversations')->get();

        //
        return view('inbox', ['messages' => $messages]);
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
                'message' => 'required|max:3000'
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
             * When the form is submitted:
             * The subject is added to Conversation
             * conversation_id, sender_user_id (Currently logged in user), message_content is added to Message
             * conversation_id, user_id (of recipient), is_read, is_starred are added to participants which is a pivot table
             */
            $user = Auth::user();

            $create = Conversation::create(
                [
                    'subject' => $request->subject
                ]);

            $conversation = Conversation::find($create->conversation_id);

            $user_id = $request->recipient; //recipient's user_id

            if ($create) {
                //
                $message = new Message(
                    [
                        'sender_user_id' => $user->user_id,
                        'message_content' => $request->message
                    ]);

                $save = $conversation->messages()->save($message);
                
                $attach = $conversation->users()->attach($user_id);

                if ($save) {
                    echo "Success";
                }
            }
        }
    }

}
