<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@news');
Route::get('/about', 'PagesController@about');

Route::resource('posts', 'PostsController');
Route::resource('releases', 'ReleasesController');