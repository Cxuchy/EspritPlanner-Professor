<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/*
Professor
*/
Route::get('/', [DashboardController::class,'index'])->name('index');
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
