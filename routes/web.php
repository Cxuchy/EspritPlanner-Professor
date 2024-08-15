<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Student\PlanExamController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;




/*
Email Verification After creating a new account
*/
Route::get('/email/verify', function () {
    return view('frontend.auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/')->with([
        'success_account' => 'Account verified',
        'alert-type' => 'success'
    ]);;
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


/*
Professor
*/
Route::get('/', [DashboardController::class,'index'])->name('index')->middleware('verified');
Route::get('/schedule', [ScheduleController::class,'schedule'])->name('schedule');
Route::get('/complaint', [ComplaintController::class,'complaint'])->name('complaint');
Route::get('/sign-up', [AuthController::class,'signup'])->name('sign-up');
Route::post('/sign-up', [AuthController::class,'store']);


// forget password
Route::get('/forgot-password', [PasswordResetController::class , 'get_forget_password'])->middleware('guest')->name('forgot-password');
Route::post('/forgot-password', [PasswordResetController::class , 'post_forget_password'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}',[PasswordResetController::class , 'get_reset_password'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class , 'post_reset_password'])->middleware('guest')->name('password.update');


Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/profile', [ProfileController::class,'profile'])->name('profile');

Route::get('/schedule',[ScheduleController::class,'show']);
Route::post('/submit-schedule', [ScheduleController::class,'submitSchedule'])->name('submit-schedule');

//delete pending request
Route::delete('/primaryplanning', [ScheduleController::class, 'destroy'])->name('primaryplanning.destroy');

Route::post('/submit-complaint', [ComplaintController::class,'submitComplaint'])->name('submit-complaint');

//generate final schedule
Route::post('/generate-planning', [ScheduleController::class,'generatePlanning'])->name('generate-planning');

Route::get('/calendar', [CalendarController::class,'calendar'])->name('calendar');

Route::post('/send-email', [ScheduleController::class,'sendEmail'])->name('send-email');



/*
Student
*/
Route::get('/profile-student', [ProfileController::class,'profile_student'])->name('profile-student');
Route::get('/plan-exams', [PlanExamController::class,'planExams'])->name('plan-exams');
Route::post('/submit-plan', [PlanExamController::class,'submitPlan'])->name('submit-plan');

