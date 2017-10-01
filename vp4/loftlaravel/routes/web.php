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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show/{id}', 'HomeController@show');
Route::post('/order','HomeController@order');
Route::get('/category/{id}', 'HomeController@category');


Route::group(['middleware' => [ 'auth', 'adminonly'], 'prefix' => 'admin'], function(){
	Route::get('/', 'GoodController@index');
	Route::get('/show/{id}', 'GoodController@show');
	Route::get('/create', 'GoodController@create');
	Route::post('/store', 'GoodController@store');
	Route::get('/edit/{id}', 'GoodController@edit');
	Route::post('/update/{id}', 'GoodController@update');
	Route::get('/destroy/{id}', 'GoodController@destroy');
});

