<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentee\ProfileController;
use App\Http\Controllers\Mentee\ActivityController;
use App\Http\Controllers\Mentee\DashboardController;


// Route Mentee
Route::middleware(['auth'])->prefix('mentee')->name('mentee.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('activity', ActivityController::class);

    Route::resource('profile', ProfileController::class)->except(['create', 'store', 'show', 'destroy']);

});
