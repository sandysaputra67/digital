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
    Route::get('{restaurant}/scan-qr', 'QrController@scan')->name('restaurant.scan-qr');
    Route::get('{restaurant}/show-qr', 'QrController@show')->name('restaurant.show-qr');
    Route::get('{restaurant}/menus', 'MenuController@index')->name('restaurant.menu');
    Route::get('{restaurant}/menus/{menu}', 'MenuController@show')->name('restaurant.menu.show');
});
