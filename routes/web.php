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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/restaurants', 'RestaurantController@index')->name('restaurants.index');
    Route::get('/events/moreinfo', 'EventController@moreInfo')->name('events.description');
    Route::get('/events/add', 'EventController@add')->name('events.addevent');
    
    
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/users', 'UserController@index')->name('users.index');
        Route::put('/users/{user}', 'UserController@update')->name('users.update');
        Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
        Route::post('/events', 'EventController@store')->name('events.store');
        Route::get('/events/create', 'EventController@create')->name('events.create');
        Route::put('/events/{event}', 'EventController@update')->name('events.update');
        Route::delete('/events/{event}', 'EventController@destroy')->name('events.destroy');
        Route::get('/events/{event}/edit', 'EventController@edit')->name('events.edit');
        Route::post('/restaurants', 'RestaurantController@store')->name('restaurants.store');
        Route::get('/restaurants/create', 'RestaurantController@create')->name('restaurants.create');
        Route::delete('/restaurants/{restaurant}', 'RestaurantController@destroy')->name('restaurants.destroy');
        Route::put('/restaurants/{restaurant}', 'RestaurantController@update')->name('restaurants.update');
        Route::get('/restaurants/{restaurant}/edit', 'RestaurantController@edit')->name('restaurants.edit');
    });
});
