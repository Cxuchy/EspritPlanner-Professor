<?php

namespace App\Http\Controllers;

use App\Mail\PlanningMail;
use Illuminate\Http\Request;
use App\Models\Request as req;
use App\Models\PassageExam;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    //

    public function show()
    {
        $currentUser = auth()->user();

        //List of PassageExam
        $passageExam = PassageExam::orderBy('datepassage', 'asc')
            ->orderBy('heurepassage', 'asc')
            ->get(); // get all


        $myprimaryplanning = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->select('passageexams.*', 'requests.*')
            ->where('userid', '=', $currentUser->id)
            ->orderBy('datepassage', 'asc')
            ->orderBy('heurepassage', 'asc')
            ->get();


        $mysecondaryplanning = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->select('passageexams.*', 'requests.*')
            ->where('userid', '=', $currentUser->id)
            ->where('type', '=', 2)
            ->get();


        $finalplanning = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->select('passageexams.*', 'requests.*')
            ->where('userid', '=', $currentUser->id)
            ->where('status', '=', 'accepted')
            ->get();

        $unlock_planning = DB::table('settings')
            ->where('id', '=', 1)
            ->pluck('unlock_exams');


        return view('frontend.Professor.schedule.schedule', [
            'data' => $passageExam,
            'myprimaryplanning' => $myprimaryplanning,
            'mysecondaryplanning' => $mysecondaryplanning,
            'hasplanning' => $currentUser->hasplanning,
            'finalplanning' => $finalplanning,
            'unlock_planning' => $unlock_planning,

        ])->with('nothing', 'empty message');
    }

    public function submitSchedule(Request $request)
    {

        // Get the selected exam IDs from the checkboxes
        $selectedExamIds_1 = $request->input('selected_exams_list1', []);
        $selectedExamIds_2 = $request->input('selected_exams_list2', []);

        if (count($selectedExamIds_1) == 10) {

            $user = auth()->user();
            $currentUser = User::findOrFail($user->id);
            // update the hasplanning to 1
            $currentUser->hasplanning = 1;
            //update changes
            $currentUser->save();


            // First List of choices
            foreach ($selectedExamIds_1 as $examId) {

                $passageexam = PassageExam::findOrFail($examId);
                // Increment the desired field by 1
                $passageexam->increment('nbprof_enrolled');

                DB::table('requests')->insert([
                    'passageexamid' => $examId,
                    'userid' => auth()->user()->id,
                    'requestDate' => now(),
                    'status' => 'pending',
                    'type' => '1'
                ]);
            }

            // Second List of choices
            foreach ($selectedExamIds_2 as $examId) {

                $passageexam = PassageExam::findOrFail($examId);
                // Increment the desired field by 1
                $passageexam->increment('nbprof_enrolled');

                DB::table('requests')->insert([
                    'passageexamid' => $examId,
                    'userid' => auth()->user()->id,
                    'requestDate' => now(),
                    'status' => 'pending',
                    'type' => '2'
                ]);
            }
            return redirect()->back()->with([
                'success' => 'Exam Supervision Requests sent!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'danger' => 'Please select exactly 10 seperate choices for list1 and list2',
                'alert-type' => 'warning'
            ]);
        }
    }

    public function destroy()
    {

        $currentUser = auth()->user();
        $user = User::findOrFail($currentUser->id);
        // update the hasplanning to 1
        $user->hasplanning = 0;
        //update changes
        $user->save();

        $RejectedPassageExamIds = DB::table('requests')
            ->where('requests.userid', $currentUser->id)
            ->pluck('passageexamid');

        DB::table('passageexams')
            ->whereIn('id', $RejectedPassageExamIds)
            ->decrement('nbprof_enrolled');

        req::where('userid', $currentUser->id)->delete();

        return redirect()->back()->with([
            'success_delete' => 'Record deleted successfully',
            'alert-type' => 'success'
        ]);
    }



    //this function is used to attribute planning to prof --> 6 from primary planning and 4 from secondary planning + random saturday supervisions from 0 to 4
    public function generatePlanning()
    {
        $currentUser = auth()->user();

        // select the 6 first primary requests (type 1) thas has the most amount of places available and make them accepted
        $primary_accepted_requests = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->where('requests.userid', $currentUser->id)
            ->where('requests.type', 1)
            ->orderBy(DB::raw('nbprof_required - nbprof_enrolled'), 'desc')
            ->select('requests.id')
            ->take(6)
            ->pluck('requests.id');

        DB::table('requests')
            ->whereIn('id', $primary_accepted_requests)
            ->update(['status' => 'accepted']);

        // select the 4 first secondary requests (type 2) that has the most amoutn of places available and make them accepted
        $secondary_accepted_requests = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->where('requests.userid', $currentUser->id)
            ->where('requests.type', 2)
            ->orderBy(DB::raw('nbprof_required - nbprof_enrolled'), 'desc')
            ->select('requests.id')
            ->take(4)
            ->pluck('requests.id');

        DB::table('requests')
            ->whereIn('id', $secondary_accepted_requests)
            ->update(['status' => 'accepted']);

        // make the other requests rejected and increment back the passage exam table places
        // making the other requests rejected
        $primary_rejected_requests = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->where('status', "pending")
            ->where('type', 1)
            ->update(['status' => 'rejected']);

        $secondary_rejected_requests = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->where('status', "pending")
            ->where('type', 2)
            ->update(['status' => 'rejected']);

        // incrementing back the number of available places
        $RejectedPassageExamIds = DB::table('requests')
            ->where('requests.userid', $currentUser->id)
            ->where('status', 'rejected')
            ->pluck('passageexamid');

        DB::table('passageexams')
            ->whereIn('id', $RejectedPassageExamIds)
            ->decrement('nbprof_enrolled');

        // now you have exactly 10 final choices that will be sumitted

        // saturday planning -> every professor has a number of atrributed supervisions on saturdays
        $saturday_supervisions = PassageExam::whereRaw('DAYOFWEEK(datepassage) = 7')->pluck('id');

        if (count($saturday_supervisions) > 0) {

            // the admin chooses the nb of saturdays supervision for every professor
            $saturdays_supervisions_count = DB::table('settings')
                ->where('id', '=', 1)
                ->pluck('saturdays_supervisions');
            $my_saturday_supervisions = $saturday_supervisions->random($saturdays_supervisions_count[0]);

            // Loop through the selected elements and execute an insert query for each one
            foreach ($my_saturday_supervisions as $entity) {
                DB::table('requests')->insert([
                    'userid' => auth()->user()->id,
                    'passageexamid' => $entity,
                    'requestDate' => now(),
                    'status' => 'accepted',
                    'type' => '1'
                ]);

                DB::table('passageexams')
                    ->whereIn('id', $my_saturday_supervisions)
                    ->increment('nbprof_enrolled');
            }
        }


        return redirect()->back()->with([
            'success_generate' => 'Your planning is generated',
            'alert-type' => 'success'
        ]);
    }



    public function sendEmail()
    {
        $currentUser = auth()->user();
        $toEmail = $currentUser->email;
        $message = 'test';
        $subject = "Exam Planning for" . " " . $currentUser->nom;


        $myfinalplanning = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->select('passageexams.*', 'requests.*')
            ->where('userid', '=', $currentUser->id)
            ->where('status', '=', 'accepted')
            ->orderBy('datepassage', 'asc')
            ->orderBy('heurepassage', 'asc')
            ->get();

        //  empty array to store events
        $events = [];
        // Iterate through each record and format it for the events array
        foreach ($myfinalplanning as $item) {

            $events[] = [
                'summary' => "Exam Supervision",
                'description' => "Monitoring students during their examinations to ensure academic integrity and compliance with exam rules.",
                'location' => "Esprit El Ghazela",
                'start_date' => Carbon::parse($item->datepassage . ' ' . $item->heurepassage - 1 . ':00:00'),
                'end_date' => Carbon::parse($item->datepassage . ' ' . $item->heurepassage - 1 . ':00:00')->addHours(2),
            ];
        }

        Mail::to($toEmail)->send(new PlanningMail($message, $subject, $myfinalplanning, $events));

        return back()->with([
            'email_success' => 'Email sent successfully',
            'alert-type' => 'success'
        ]);
    }
}
