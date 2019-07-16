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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
    Route::get('/users','UserController@index')->name('users.index');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::post('/default', 'DefaultController@store')->name('default.store');
    Route::get('/default', 'defaultController@index')->name('default.index');
    Route::get('/default/create', 'defaultController@create')->name('default.create');
    Route::delete('/default/{restaurant}', 'defaultController@destroy')->name('default.destroy');
    Route::put('/default/{restaurant}', 'defaultController@update')->name('default.update');
    Route::get('/default/{restaurant}/edit', 'defaultController@edit')->name('default.edit');
    Route::get('/test', 'testController@index')->name('test.index');
    Route::post('/test', 'testController@store')->name('test.store');
    Route::get('/test/create', 'testController@create')->name('test.create');
    Route::put('/test/{event}', 'testController@update')->name('test.update');
    Route::delete('/test/{event}', 'testController@destroy')->name('test.destroy');
    Route::get('/test/{event}/edit', 'testController@edit')->name('test.edit');
});
