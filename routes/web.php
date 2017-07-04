<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/releases/{id}', 'ReleasesController@show');

Route::resource('releases', 'ReleasesController');