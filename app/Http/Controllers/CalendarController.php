<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    //
    public function calendar()
    {

        $currentUser = auth()->user();

        // select the accepted planning -> will receive exactly 10 choices
        $myfinalplanning = DB::table('requests')
            ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
            ->select('passageexams.*', 'requests.*')
            ->where('userid', '=', $currentUser->id)
            ->where('status', '=', 'accepted')
            ->orderBy('datepassage', 'asc')
            ->orderBy('heurepassage', 'asc')
            ->get();



        // Transform the data into the required format
        $events = $myfinalplanning->map(function ($planning) {
            $heurefin = $planning->heurepassage + 2;
            return [
                'title' => 'Exam Supervision',
                'start' => $planning->datepassage . 'T' . $planning->heurepassage . ':00:00',
                'end' => $planning->datepassage . 'T' . $heurefin . ':00:00',
                'id' => $planning->id
            ];
        })->toArray(); ;

        return view(
            'frontend.calendar.calendar',
            [
                'events' => $events
            ]
        );
    }
}
