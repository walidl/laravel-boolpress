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
Route::get('category/{name}','CategoryController@catIndex')->name("catIndex");
// Route::resource('post','PostController');
Route::get('admin/post/new','PostController@create')->name('post.create');
Route::post('admin/post/','PostController@create')->name('post.store');
Route::get('/post/{id}','PostController@show')->name('post.show');
Route::get('admin/post/edit/{id}','PostController@edit')->name('post.edit');
Route::patch('admin/post/edit/{id}','PostController@update')->name('post.update');

Route::get('/search','SearchController@search')->name('search.get');



// Route::post('/search','SearchController@getSearch');

// Route::get('/search/sesda','SearchControlled

// Route::get('search?title={coding}&author={coding}')
