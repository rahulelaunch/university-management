<?php

// use App\Http\Controllers\University\CollegeController;

// use App\Http\Controllers\University\CollegeController;
use App\Http\Controllers\University\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Auth'], function(){

    Route::get('login',     'LoginController@showLoginForm')->name('login');
    Route::post('login',    'LoginController@login');
    Route::post('logout',   'LoginController@logout')->name('logout');

});

Route::group(['middleware' => 'auth:university'],function (){
    Route::get('dashboard',      [DashboardController::class, 'index'])->name('dashboard');
    Route::get('Profile',        [DashboardController::class, 'profile'])->name('profile');
    Route::post('profileupdate', [DashboardController::class, 'profileupdate'])->name('profileupdate');
    Route::get('changePassword', [DashboardController::class,'changePassword'])->name('changepassword');
    Route::post('resetPassword', [DashboardController::class,'resetPassword'])->name('resetpassword');

    Route::resource('colleges', CollegeController::class);
    Route::post('change-status/{id}','CollegeController@changeStatus')->name('change-status');
});