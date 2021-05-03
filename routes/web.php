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
    Route::get('{restaurant}/show-menu/{id}', 'MenuController@showMenuById')->name('restaurant.show-menu');
    Route::get('{restaurant}/get-menu/', 'MenuController@getMenus')->name('restaurant.menu.getMenus');
    Route::get('{restaurant}/menus/{menu}', 'MenuController@show')->name('restaurant.menu.show');

    Route::group(['prefix' => '{restaurant}/table'], function () {
        Route::post('/findTable', 'TableController@findTable')->name('table.findTable');
    });

    Route::group(['prefix' => '{restaurant}/cart'], function () {
        Route::get('/', 'CartController@index')->name('cart.index');
        Route::get('/get-cart', 'CartController@getCart')->name('cart.get-cart');
        Route::post('/reservation', 'CartController@reservation')->name('cart.reservation');
        Route::post('/add-to-cart', 'CartController@addToCart')->name('cart.add-to-cart');
    });
});
