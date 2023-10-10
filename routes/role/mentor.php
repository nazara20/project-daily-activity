<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentor\MenteeController;
use App\Http\Controllers\Mentor\ProfileController;
use App\Http\Controllers\Mentor\ActivityController;
use App\Http\Controllers\Mentor\DashboardController;


// Route Mentor
Route::middleware(['auth'])->prefix('mentor')->name('mentor.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('mentee', [MenteeController::class, 'index'])->name('mentee.index');
    Route::get('activity', [ActivityController::class, 'index'])->name('activity.index');
   
    Route::resource('profile', ProfileController::class)->except(['create', 'store', 'show', 'destroy']);

   
});
