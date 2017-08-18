<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Route::get('/', 'PagesController@home');
Route::get('/', 'PagesController@admin');
Route::get('/about', 'PagesController@about');
Route::get('/releases', 'PagesController@releases');
Route::get('/allposts', 'PagesController@posts');
Route::get('/files', 'PagesController@files');
//Route::get('/admin', 'PagesController@admin');

Route::resource('posts', 'PostsController');