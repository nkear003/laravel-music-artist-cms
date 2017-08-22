<?php

/*
|--------------------------------------------------------------------------
| Pages Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@admin');
Route::get('/about', 'PagesController@about');

Route::get('/releases', 'PagesController@releases');
Route::get('/wm', 'PagesController@wm');
Route::get('/posters', 'PagesController@posters');

Route::get('/test', 'PagesController@test');

Route::get('/allposts', 'PagesController@posts');
Route::get('/files', 'PagesController@files');

/*
|--------------------------------------------------------------------------
| Posts Routes
|--------------------------------------------------------------------------
*/

Route::resource('posts', 'PostsController');