<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as req;
use App\Models\PassageExam;
use DateTime;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    //

    public function show()
{
    $currentUser = auth()->user();
    //dd(request()->all());
    //$data = PassageExam::all();

    $passageExam = PassageExam::orderBy('datepassage', 'desc')
                       ->orderBy('heurepassage', 'asc')
                       ->get();


    $myprimaryplanning = DB::table('requests')
    ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
    ->select('passageexams.*', 'requests.*')
    ->where('userid','=', $currentUser->id)
    ->where('type','=', 1)
    ->get();


    $mysecondaryplanning = DB::table('requests')
    ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
    ->select('passageexams.*', 'requests.*')
    ->where('userid','=', $currentUser->id)
    ->where('type','=', 2)
    ->get();


    //$myprimaryplanning = req::where('userid','=', $currentUser->id)->with('passageexams')
    //->get();

    return view('frontend.schedule.schedule', [
        'data' => $passageExam,
        'myprimaryplanning' => $myprimaryplanning,
        'mysecondaryplanning' => $mysecondaryplanning
        ])->with('nothing', 'empty message');
}




    /*public function submitSchedule(Request $request)
    {


        // Validate the request
        $request->validate([
            'passageexam' => 'required|array',
            'passageexam.*' => 'exists:passageexams,id',
        ]);

        $currentDateTime = new DateTime();
        // Process the selected exams
        $selectedpassageexam = $request->input('passageexam');
        foreach ($selectedpassageexam as $pasasgeid) {
            // Perform your add operation here. For example, adding to another table.
            // Example:
            // SelectedExam::create(['exam_id' => $examId, 'user_id' => auth()->id()]);

        }






    return view('frontend.home')->with('success', 'Exams added successfully!');;
    }*/


    public function submitSchedule(Request $request)
    {
        // Validate incoming requests if necessary
        $request->validate([
            'selected_exams_list1' => 'required|array',
            'selected_exams_list2.*' => 'exists:passageexams,id',
        ]);

        $request->validate([
            'selected_exams_list2' => 'required|array',
            'selected_exams_list2.*' => 'exists:passageexams,id',
        ]);

        // Get the selected exam IDs from the checkboxes
        $selectedExamIds_1 = $request->input('selected_exams_list1', []);
        $selectedExamIds_2 = $request->input('selected_exams_list2', []);


                // First List of choices
                foreach ($selectedExamIds_1 as $examId) {
                    // Perform your add operation here using $examId
                    // Example:
                    // Assuming 'passageexamid' is the column in your database table

                    $passageexam = PassageExam::findOrFail($examId);
                    // Increment the desired field by 1
                    $passageexam->increment('nbprof_enrolled');



                    DB::table('requests')->insert([
                        'passageexamid' => $examId,
                        'userid' => auth()->user()->id,
                        'requestDate'=> now(),
                        'status' => 'accepted',
                        'type' => '1'
                    ]);
                }

                // Second List of choices
                foreach ($selectedExamIds_2 as $examId) {
                    // Perform your add operation here using $examId
                    // Example:
                    // Assuming 'passageexamid' is the column in your database table


                    $passageexam = PassageExam::findOrFail($examId);
                    // Increment the desired field by 1
                    $passageexam->increment('nbprof_enrolled');

                    DB::table('requests')->insert([
                        'passageexamid' => $examId,
                        'userid' => auth()->user()->id,
                        'requestDate'=> now(),
                        'status' => 'pending',
                        'type' => '2'
                    ]);
                }

                // Redirect or return a response as needed
             return redirect()->back()->with('success', 'Exam Supervision Requests sent!');




    }

}


