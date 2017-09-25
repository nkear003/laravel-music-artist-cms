<?php

/*
|--------------------------------------------------------------------------
| Pages Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', 'PagesController@admin');
Route::get('/about', 'PagesController@about');

Route::get('/', 'PagesController@news');

Route::get('/releases', 'PagesController@releases');
Route::get('/wm', 'PagesController@wm');
Route::get('/posters', 'PagesController@posters');
Route::get('/allreleases', 'PagesController@releases');


/*
|--------------------------------------------------------------------------
| Releases Routes
|--------------------------------------------------------------------------
*/

Route::resource('releases', 'ReleasesController');

/*
|--------------------------------------------------------------------------
| Image Routes
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
