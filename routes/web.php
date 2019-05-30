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

Route::get('/','HomeController@index');
Route::resource('category','CategoryController');
Route::resource('post','PostController');
Route::get('/search','SearchController@search')->name('search.get');



// Route::post('/search','SearchController@getSearch');

// Route::get('/search/sesda','SearchControlled

// Route::get('search?title={coding}&author={coding}')
