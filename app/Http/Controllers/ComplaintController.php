<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    //

    public function submitComplaint()
    {
        $validated = request()->validate(
            [
                'type' => 'required',
                'details' => 'required|min:5'
            ]
            );

            DB::table('reclamations')->insert(
                [
                    'userid'=> auth()->user()->id,
                    'submissionDate'=> now(),
                    'status' => "pending",
                    'type' => $validated['type'],
                    'submitMessage' => $validated['details'],
                ]
                );

            return redirect()->route('complaint')->with('success','complaint sent');

    }

    public function complaint()
    {

        $mycomplaints = DB::table('reclamations')
        ->where('userid','=', auth()->user()->id)
        ->get();
        return view('frontend.Professor.complaint.complaint',
    [
        'complaints' => $mycomplaints ,
        'user' =>  auth()->user(),
        'today_date' => now()
    ]);

    }

}
