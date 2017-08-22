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
Route::get('/allposts', 'PagesController@posts');


/*
|--------------------------------------------------------------------------
| Posts Routes
|--------------------------------------------------------------------------
*/

Route::resource('posts', 'PostsController');

/*
|--------------------------------------------------------------------------
| Image Routes
|--------------------------------------------------------------------------
*/

Route::resource('files', 'FilesController');