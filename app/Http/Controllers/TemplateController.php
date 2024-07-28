<?php

namespace App\Http\Controllers;

use App\Models\PassageExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{


/*
complaint    public function schedule()  {

        return view('frontend.schedule');
    }
*/

    public function profile()  {

        return view('frontend.Professor.profile.profile');
    }






}
