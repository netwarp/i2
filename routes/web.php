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

Route::group(['namespace' => 'Front', 'as' => 'front.'], function() {

    Route::get('/', ['as' => 'getIndex', 'uses' => 'FrontController@getIndex']);

    Route::get('acheter', ['as' => 'getBuy', 'uses' => 'FrontController@getBuy']);

    Route::get('fiche/{id}/{slug}', ['as' => 'getCard', 'uses' => 'FrontController@getCard']);

    Route::get('vendre', ['as' => 'getSell', 'uses' => 'FrontController@getSell']);
    Route::post('vendre', ['as' => 'postSell', 'uses' => 'FrontController@postSell']);

    Route::get('agence', ['as' => 'getAgence', 'uses' => 'FrontController@getAgence']);

    Route::get('vendus', ['as' => 'getSold', 'uses' => 'FrontController@getSold']);

    Route::get('cgv', ['as' => 'getCgv', 'uses' => 'FrontController@getCgv']);
});

Route::get('login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {

	Route::get('/', ['as' => 'getindex', 'uses' => 'DashboardController@getIndex']);

	Route::resource('cards', 'CardsController');

	Route::resource('messages', 'MessagesController');

	Route::get('cgv', ['as' => 'getCgv', 'uses' => 'DashboardController@getCgv']);
	Route::post('cgv', ['as' => 'postCgv', 'uses' => 'DashboardController@postCgv']);

	Route::get('agence', ['as' => 'getAgence', 'uses' => 'DashboardController@getAgence']);
});

Route::get('images/cards/{folder}/{file}', function($folder, $file) {
	$path = storage_path("app/cards/$folder/$file");
	$image = Image::make($path);
	header('Content-Type: image/png');
	return $image->response();
});
