<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/releases', 'PagesController@releases');

//Route::resource('posts', 'PostsController');
//Route::resource('releases', 'ReleasesController');