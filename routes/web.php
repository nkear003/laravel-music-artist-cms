<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('releases', 'ReleasesController');
Route::get('/releases/{id}', 'ReleasesController@show');
