<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('university',  function(){
    return redirect()->route('university.login');
});

Route::get('college',  function(){
    return redirect()->route('college.login');
});

Route::get('student',  function(){
    return redirect()->route('student.login');
});
