<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::resource('releases', 'ReleasesController');
Route::get('/releases/{id}', 'ReleasesController@show');
Route::get('/releases/{id}', 'ReleasesController@index');

Route::resource('posts', 'PostsController');

Route::get('/', 'PagesController@news');
Route::get('/about', 'PagesController@about');