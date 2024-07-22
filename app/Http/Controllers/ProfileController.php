<?php

namespace App\Http\Controllers;

use App\Models\Passageexam;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function profile()  {

         // Get the currently authenticated user
         $currentUser = auth()->user();
         $exams = Passageexam::take(4)->orderBy('datepassage', 'desc')->get();

         // Retrieve all users except the authenticated one
         $users = User::where('id', '!=', $currentUser->id)->get();

        return view('frontend.Professor.profile.profile',[
            'users'=> $users ,
            'exams'=> $exams
        ]);
    }
}
