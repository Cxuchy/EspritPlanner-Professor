<?php

namespace App\Http\Controllers;

use App\Models\PassageExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()  {
        //checks if the user is logged in
        if (Auth::check()) {
            return view('frontend.home');
        } else {
            // The user is not logged in
            return view('frontend.auth.sign-in');
        }

    }

/*
complaint    public function schedule()  {

        return view('frontend.schedule');
    }
*/

    public function profile()  {

        return view('frontend.profile.profile');
    }






}
