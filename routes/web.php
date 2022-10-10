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

Route::group(['prefix' => 'folder', 'as' => 'folder.', 'middleware' => 'auth'], function () {
    Route::get('/index', 'FolderController@index')->name('index');
    Route::get('/{id}', 'FolderController@show')->name('show');
    Route::post('/store', 'FolderController@store')->name('store');
    Route::post('/{id}/update', 'FolderController@update')->name('update');
    Route::post('/{id}/delete', 'FolderController@delete')->name('delete');
});