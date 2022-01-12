<?php

// use App\Http\Controllers\University\CollegeController;

// use App\Http\Controllers\University\CollegeController;
use App\Http\Controllers\University\DashboardController;
// use App\Http\Controllers\University\StudentController;
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
    Route::resource('students', StudentController::class);
    Route::post('change-status/{id}','CollegeController@changeStatus')->name('change-status');
    Route::resource('common-Settings', CommonSettingController::class);
    Route::post('common-Settings/{id}','CommonSettingController@update')->name('commonSetting.update');
    Route::resource('courses', CourseController::class);
    Route::post('courses/{id}','CourseController@update')->name('course.update');
    Route::post('course-change-status/{id}','CourseController@changeStatus')->name('course-change-status');
    Route::resource('merit-rounds', MeritRoundController::class);
    Route::post('merit-rounds/{id}','MeritRoundController@update')->name('meritRound.update');
    Route::post('merit-rounds-status/{id}','MeritRoundController@changeStatus')->name('meritRounds-change-status');

});