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

Route::group(['namespace' => 'Front', 'as' => '.front'], function() {

    Route::get('/', ['as' => 'getIndex', 'uses' => 'FrontController@getIndex']);

    Route::get('/acheter', ['as' => 'getBuy', 'uses' => 'FrontController@getBuy']);

    Route::get('/fiche', ['as' => 'getCard', 'uses' => 'FrontController@getCard']);

    Route::get('/vendre', ['as' => 'getSell', 'uses' => 'FrontController@getSell']);
});
