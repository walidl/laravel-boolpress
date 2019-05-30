<?php


Route::get('/','HomeController@index');
Route::get('category/{name}','CategoryController@catIndex')->name("catIndex");
// Route::resource('post','PostController');
Route::get('admin/post/new','PostController@create')->name('post.create');
Route::post('admin/post/','PostController@create')->name('post.store');
Route::get('/post/{id}','PostController@show')->name('post.show');
Route::get('admin/post/edit/{id}','PostController@edit')->name('post.edit');
Route::patch('admin/post/edit/{id}','PostController@update')->name('post.update');

Route::get('/search','SearchController@search')->name('search.get');
