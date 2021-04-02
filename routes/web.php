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
    Route::get('/register', 'HomeController@register')->name('home.register');
    Route::post('/postRegister', 'HomeController@postRegister')->name('home.postRegister');
    Route::post('/postLogin', 'HomeController@postLogin')->name('home.postLogin');
    Route::post('/checkCode', 'HomeController@checkCode')->name('home.checkCode');
});


Route::group(['middleware' => ['check.logout']], function () {
    Route::get('/', 'HomeController@index')->name('home.index');


    Route::group(['prefix' => 'category'], function () {
        Route::get('/add', 'CategoryController@add')->name('dashboard.category.add');
        Route::get('/', 'CategoryController@index')->name('dashboard.category.show');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('dashboard.category.edit');
        Route::post('/update', 'CategoryController@update')->name('dashboard.category.update');
        Route::post('/delete', 'CategoryController@delete')->name('dashboard.category.delete');
        Route::post('/addPost', 'CategoryController@addPost')->name('dashboard.category.addPost');
    });

    Route::group(['prefix' => 'pay'], function () {
        Route::get('/add', 'PayController@add')->name('dashboard.pay.add');
        Route::get('/', 'PayController@index')->name('dashboard.pay.show');
        Route::get('/edit/{id}', 'PayController@edit')->name('dashboard.pay.edit');
        Route::post('/update', 'PayController@update')->name('dashboard.pay.update');
        Route::post('/delete', 'PayController@delete')->name('dashboard.pay.delete');
        Route::post('/addPost', 'PayController@addPost')->name('dashboard.pay.addPost');
    });
});
