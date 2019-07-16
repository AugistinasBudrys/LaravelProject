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

Route::group(['middleware'=>'auth.admin'], function(){
    Route::get('/users','UserController@index')->name('users.index');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::post('/restaurants', 'DefaultController@index')->name('default.index');
    Route::get('/restaurants', 'DefaultController@index')->name('default.index');
    Route::get('/restaurants/create', 'DefaultController@index')->name('default.index');
    Route::delete('/restaurants/{restaurant?}', 'DefaultController@index')->name('default.index');
    Route::put('/restaurants/{restaurant?}', 'DefaultController@index')->name('default.index');
    Route::get('/restaurants/{restaurant?}/edit', 'DefaultController@index')->name('default.index');
    Route::get('/events', 'DefaultController@index')->name('default.index');
    Route::post('/events', 'DefaultController@index')->name('default.index');
    Route::get('/events/create', 'DefaultController@index')->name('default.index');
    Route::put('/events/{event?}', 'DefaultController@index')->name('default.index');
    Route::delete('/events/{event?}', 'DefaultController@index')->name('default.index');
    Route::get('/events/{event?}/edit', 'DefaultController@index')->name('default.index');
});
