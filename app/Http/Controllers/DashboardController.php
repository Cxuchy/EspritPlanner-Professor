<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PassageExam;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
use App\Models\Passagecredit;
use App\Models\Usercredit;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //checks if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == "Professor") {

                // top content
                $all_users_count = User::where("role", "=", "Professor")->count();
                $users_have_planning_count = User::where("role", "=", "Professor")->where("hasplanning", "=", 1)->count();
                $supervisions_count = PassageExam::where("datepassage", ">", now())->count();

                //charts content days of the weeek
                $currentUser = auth()->user();
                $weekdayCounts  = DB::table('requests')
                    ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
                    ->select('passageexams.*', 'requests.*')
                    ->where('userid', '=', $currentUser->id)
                    ->where('status', '=', 'accepted')
                    ->orderBy('datepassage', 'asc')
                    ->orderBy('heurepassage', 'asc')
                    ->select(
                        DB::raw('DAYOFWEEK(datepassage) as weekday'),
                        DB::raw('count(*) as count')
                    )
                    ->groupBy('weekday')
                    ->get();

                $weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                // Initialize all weekdays with 0 counts
                $result_count_days = collect($weekdays)->mapWithKeys(function ($weekday) {
                    return [$weekday => 0];
                });
                // Update with actual counts
                $weekdayCounts->each(function ($item) use ($weekdays, &$result_count_days) {
                    $weekday = $weekdays[$item->weekday - 1];
                    $result_count_days[$weekday] = $item->count;
                });

                //charts content months of the year
                $monthCounts  = DB::table('requests')
                    ->join('passageexams', 'requests.passageexamid', '=', 'passageexams.id')
                    ->select('passageexams.*', 'requests.*')
                    ->where('userid', '=', $currentUser->id)
                    ->where('status', '=', 'accepted')
                    ->orderBy('datepassage', 'asc')
                    ->orderBy('heurepassage', 'asc')
                    ->select(
                        DB::raw('MONTH(datepassage) as month'),
                        DB::raw('count(*) as count')
                    )
                    ->groupBy('month')
                    ->get();

                $months = [
                    1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                    5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                    9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                ];

                $result_count_months = collect($months)->mapWithKeys(function ($monthName, $monthNumber) use ($monthCounts) {
                    $count = $monthCounts->firstWhere('month', $monthNumber)->count ?? 0;
                    return [$monthName => $count];
                });



                return view(
                    'frontend.Professor.home',
                    [
                        'user_count' => $all_users_count,
                        'users_have_planning_count' => $users_have_planning_count,
                        'supervisions_count' => $supervisions_count,
                        'result_count_days' => $result_count_days,
                        'result_count_months' => $result_count_months,
                        'user' => $currentUser
                    ]
                );
            }
            if ($user->role == "Student") {

                // return credits with this page
                if ($user->hasplanning == 1) {
                    // select credits
                    $credits = Usercredit::join('modules', 'usercredits.moduleid', '=', 'modules.id')
                        ->where('usercredits.userid', '=', $user->id)
                        ->select('modules.*', 'usercredits.grade')
                        ->get();

                    return view('frontend.Student.home', [
                        'credits' => $credits
                    ]);
                } else {
                    // generate planning
                    $modules_ids = Module::inRandomOrder()->limit(5)->pluck('id');
                    $min = 0;
                    $max = 7.99;

                    foreach ($modules_ids as $module_id) {
                        $grade = $this->getRandomFloat($min, $max);
                        Usercredit::create([
                            'moduleid' => $module_id,
                            'userid' => $user->id,
                            'grade' => $grade
                        ]);
                    }
                    // the user is now having a planning
                    $user->hasplanning = 1;
                    $user->save();

                    // retreive Planning
                    $credits = Usercredit::join('modules', 'usercredits.moduleid', '=', 'modules.id')
                        ->where('usercredits.userid', '=', $user->id)
                        ->select('modules.*')
                        ->get();

                    return view('frontend.Student.home', [
                        'credits' => $credits
                    ]);
                }
            }
        } else {
            // The user is not logged in
            return view('frontend.auth.sign-in');
        }
    }
    public function getRandomFloat($min, $max)
    {
        $randomFloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        return round($randomFloat, 2);
    }
}
