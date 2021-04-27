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

Route::group(['prefix' => 'restaurants', 'namespace' => 'Restaurant'], function () {
    Route::get('{restaurant}', 'HomeController@index')->name('restaurant.home');
    Route::get('{restaurant}/menu', 'MenuController@index')->name('restaurant.menu');
});
