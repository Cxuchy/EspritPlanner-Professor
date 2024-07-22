<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;


/*
Professor
*/
Route::get('/', [TemplateController::class,'index'])->name('index');

Route::get('/schedule', [ScheduleController::class,'schedule'])->name('schedule');

Route::get('/complaint', [ComplaintController::class,'complaint'])->name('complaint');

Route::get('/sign-up', [AuthController::class,'signup'])->name('sign-up');
Route::post('/sign-up', [AuthController::class,'store']);


Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');


Route::get('/profile', [ProfileController::class,'profile'])->name('profile');


// the coding part


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
