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
    Route::get('/all', 'FolderController@all')->name('all');
    Route::get('/{id}', 'FolderController@show')->name('show');
    Route::post('/store', 'FolderController@store')->name('store');
    Route::post('/{id}/update', 'FolderController@update')->name('update');
    Route::post('/{id}/delete', 'FolderController@delete')->name('delete');
});

Route::group(['prefix' => 'memo', 'as' => 'memo.'], function () {

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/create', 'MemoController@create')->name('create');
        Route::post('/store', 'MemoController@store')->name('store');
        Route::get('/{id}/edit', 'MemoController@edit')->name('edit');
        Route::post('/{id}/update', 'MemoController@update')->name('update');
        Route::post('/{id}/delete', 'MemoController@delete')->name('delete');
    });
    Route::get('/index', 'MemoController@index')->name('index');
    Route::get('/{id}', 'MemoController@show')->name('show');
    Route::get('/search', 'MemoController@search')->name('search');
});