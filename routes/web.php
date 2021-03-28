<?php

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




Route::group(['middleware' => ['check.login']], function () {
    Route::get('/login', 'HomeController@login')->name('home.login');
    Route::post('/postLogin', 'HomeController@postLogin')->name('home.postLogin');
});


Route::group(['middleware' => ['check.logout']], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
});
