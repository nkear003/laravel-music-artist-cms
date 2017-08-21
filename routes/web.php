<?php

/*
|--------------------------------------------------------------------------
| Pages Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@admin');
Route::get('/about', 'PagesController@about');

Route::get('/releases', 'PagesController@releases');
Route::get('/allposts', 'PagesController@posts');
Route::get('/wm', 'PagesController@wm');
Route::get('/posters', 'PagesController@wm');

Route::get('/files', 'PagesController@files');

/*
|--------------------------------------------------------------------------
| Posts Routes
|--------------------------------------------------------------------------
*/

Route::resource('posts', 'PostsController');