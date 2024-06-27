<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TemplateController::class,'index'])->name('index');

Route::get('/schedule', [ScheduleController::class,'schedule'])->name('schedule');

Route::get('/complaint', [TemplateController::class,'complaint'])->name('complaint');

Route::get('/sign-up', [AuthController::class,'signup'])->name('sign-up');
Route::post('/sign-up', [AuthController::class,'store']);


Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');


Route::get('/profile', [ProfileController::class,'profile'])->name('profile');


// the coding part


Route::get('/schedule',[ScheduleController::class,'show']);


Route::post('/submit-schedule', [ScheduleController::class,'submitSchedule'])->name('submit-schedule');





