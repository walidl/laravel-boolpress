<?php


Route::get('/','HomeController@index')->name('home');
// Route::get('/',function(){
//
//   return "hello";
// });

Route::get('category/{name}','CategoryController@catIndex')->name("catIndex");

Route::get('admin/post/new','PostController@create')->name('post.create')->middleware('auth');
Route::post('admin/post/','PostController@store')->name('post.store');
Route::get('/post/{id}','PostController@show')->name('post.show');
Route::get('admin/post/edit/{id}','PostController@edit')->name('post.edit')->middleware('auth');
Route::patch('admin/post/edit/{id}','PostController@update')->name('post.update')->middleware('auth');
Route::get('admin/myposts','UserpostsController@getPosts')->name('myposts')->middleware('auth');
Route::delete('admin/myposts/destroy/{id}','UserpostsController@deletePost')->name('mypost.delete')->middleware('auth');

Route::get('/search','SearchController@search')->name('search.get');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
