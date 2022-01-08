<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Auth'], function(){

    Route::get('login',     'LoginController@showLoginForm')->name('login');
    Route::post('login',    'LoginController@login');
    Route::post('logout',   'LoginController@logout')->name('logout');

});

Route::group(['middleware' => 'auth:university'],function (){

    Route::get('/dashboard',     'DashboardController@index')->name('dashboard');

});