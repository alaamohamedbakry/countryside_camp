<?php

use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\campcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\Ownercontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Roomcontroller;
use App\Http\Controllers\Schedulecontroller;
use App\Http\Controllers\Staffcontroller;
use App\Http\Controllers\UserPhoneController;
use App\Http\Controllers\Users_campscontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('camp',campcontroller::class)->except('show');
    Route::resource('owners',Ownercontroller::class)->except('show');
    Route::resource('room',Roomcontroller::class)->except('show');
    Route::resource('staff',Staffcontroller::class)->except('show');
    Route::resource('user_camp',Users_campscontroller::class)->except('show');
    Route::resource('buildings',BuildingsController::class)->except('show,destroy');
      Route::resource('Home',Homecontroller::class)->only('index');
      Route::resource('login&signup',logincontroller::class)->only('index');
      Route::resource('schedule',Schedulecontroller::class)->only('index');





});

require __DIR__.'/auth.php';
