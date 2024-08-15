<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Passagecredit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Usercredit;

class PlanExamController extends Controller
{
    //
    public function planExams()
    {
        $user = Auth::user();
        $confirmed_credits = DB::table('passagecredit')->join('usercredits', 'passagecredit.usercreditsid', '=', 'usercredits.id')
            ->join('modules', 'usercredits.moduleid', '=', 'modules.id')
            ->where('usercredits.userid', '=', $user->id)
            ->select('modules.modulename')
            ->get();


        $credits = DB::table('usercredits')->join('modules', 'usercredits.moduleid', '=', 'modules.id')
            ->where('usercredits.userid', '=', $user->id)
            ->select('modules.*','usercredits.id as ucrid')
            ->get();


        return view(
            'frontend.Student.Plan.plan-my-exams',
            [
                'confirmed_credits' => $confirmed_credits ,
                'credits' => $credits
            ]
        );
    }

    public function submitPlan(Request $request)
    {
        $selectedModuleIds_1 = $request->input('selected_exams_list1', []);
        $user = auth()->user();
        $currentUser = User::findOrFail($user->id);

        foreach ($selectedModuleIds_1 as $moduleId) {
            DB::table('passagecredit')->insert([
                'usercreditsid' => $moduleId,
            ]);
        }

        return redirect()->back()->with([
            'success' => 'Plan sent!',
            'alert-type' => 'success'
        ]);
    }
}
