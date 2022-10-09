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
    return view('top');
});

Auth::routes();

Route::group(['prefix' => 'mypage', 'namespace' => 'Mypage', 'as' => 'mypage.', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
});