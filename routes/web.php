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


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'start'], function (){
    Route::get('/', 'StartController@index')->name('start');
    Route::get('/get-json', 'StartController@getJson')->name('get-json');
    Route::get('/data-chart', 'StartController@dataChart')->name('data-chart');
    Route::get('/random-chart', 'StartController@randomChart')->name('random-chart');
});

Route::group(['prefix' => 'real'], function (){
    Route::get('/event', 'RealController@newEvent')->name('event');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
