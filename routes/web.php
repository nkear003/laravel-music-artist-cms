<?php

/*
|--------------------------------------------------------------------------
| Pages Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', 'PagesController@admin');
Route::get('/about', 'PagesController@about');

Route::get('/', 'PagesController@news');

Route::get('/wm', 'PagesController@wm');
Route::get('/posters', 'PagesController@posters');

Route::get('/releasesIndex', 'ReleasesController@releasesIndex');


/*
|--------------------------------------------------------------------------
| Releases Routes
|--------------------------------------------------------------------------
*/

Route::resource('releases', 'ReleasesController');

/*
|--------------------------------------------------------------------------
| File Routes
|--------------------------------------------------------------------------
*/

Route::resource('files', 'FilesController');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', 'HomeController@index');


// Password reset routes

/*
|--------------------------------------------------------------------------
| Download
|--------------------------------------------------------------------------
*/

Route::get('/download/{id}', [
    'uses' => 'FilesController@getDownload',
    'as' => 'download'
]);
