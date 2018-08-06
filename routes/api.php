<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::post('product', 'ProductController@store')->name('product.store');

    Route::get('order', 'OrderController@view')->name('order.view');

    Route::post('order', 'OrderController@store')
        ->middleware('throttle:10,1')
        ->name('order.store');
});
