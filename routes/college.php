
<?php

// use App\Http\Controllers\College\CollegeCourseController;

use App\Http\Controllers\College\DashboardController;
use Illuminate\Support\Facades\Route;



Route::group(['namespace' => 'Auth'], function(){

Route::get('login',     'LoginController@showLoginForm')->name('login');
Route::post('login',    'LoginController@login');
Route::post('logout',   'LoginController@logout')->name('logout');

});

Route::group(['middleware' => 'auth:college'],function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('Profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('profileupdate', [DashboardController::class, 'profileupdate'])->name('profileupdate');
    Route::get('changePassword',[DashboardController::class,'changePassword'])->name('changepassword');
    Route::post('resetPassword',[DashboardController::class,'resetPassword'])->name('resetpassword');

    Route::resource('college-courses', CollegeCourseController::class);
    Route::post('college-courses/{id}','CollegeCourseController@update')->name('collegeCourses.update');
    Route::resource('college-merits', CollegeMeritController::class);
    Route::Post('college-merits-change/{id}','CollegeMeritController@getCourse')->name('collegeMerit-change');
    Route::post('college-marits/{id}','CollegeMeritController@update')->name('collegeMerit.update');

});