<?php

use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth'], function(){

    Route::get('login',     'LoginController@showLoginForm')->name('login');
    Route::post('login',    'LoginController@login');
    Route::post('logout',   'LoginController@logout')->name('logout');
    
 });
 Route::get('/register', [StudentController::class, 'registerForm'])->name('register-form');
 Route::post('/register', [StudentController::class, 'register'])->name('register');
 
 Route::group(['middleware' => 'auth:student'],function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('Profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('profileupdate', [DashboardController::class, 'profileupdate'])->name('profileupdate');
    Route::get('changePassword',[DashboardController::class,'changePassword'])->name('changepassword');
    Route::post('resetPassword',[DashboardController::class,'resetPassword'])->name('resetpassword');

});


    