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
}
