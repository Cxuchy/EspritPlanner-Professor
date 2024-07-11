<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as req;
use App\Models\PassageExam;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;

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


        return view('frontend.schedule.schedule', [
            'data' => $passageExam,
            'myprimaryplanning' => $myprimaryplanning,
            'mysecondaryplanning' => $mysecondaryplanning,
            'hasplanning' => $currentUser->hasplanning
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

            return redirect()->back()->with('success', 'Exam Supervision Requests sent!');
        } else {
            return redirect()->back()->with('danger', 'please select exactly 10 seperate choices for list1 and list2');
        }
    }


    //destroy specific line --> add this line in web.php Route::delete('/primaryplanning/{id}', [ScheduleController::class, 'destroy'])->name('primaryplanning.destroy');

    /*public function destroy($id)
    {
        $request_exam = req::findOrFail($id);
        PassageExam::findOrFail($request_exam->passageexamid)->decrement('nbprof_enrolled');
        $request_exam->delete();

        return redirect()->back()->with('success_delete', 'Record deleted successfully');
    }*/

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

        return redirect()->back()->with('success_delete', 'Record deleted successfully');
    }



    //this function is used to attribute planning to prof --> 6 from primary planning and 4 from secondary planning
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

        return redirect()->back()->with('success_generate', 'Generated planning');
    }

    // dont forget to handle the sunday schedule now

}
