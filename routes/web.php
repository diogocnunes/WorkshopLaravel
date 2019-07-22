<?php

Route::get('/', 'HomepageController@index');

Route::resource('/movies', 'MoviesController');

Route::middleware('auth')->group(static function () {
    Route::get('/playlist', 'PlaylistController@index');
    Route::post('/playlist', 'PlaylistController@store');
    Route::patch('/playlist/{movie}', 'PlaylistController@update');
    Route::delete('/playlist', 'PlaylistController@destroy');
});

Route::post('/genres', 'GenresController@store');
Route::get('/genres', 'GenresController@index');
Route::get('/genres/create', 'GenresController@create');
Route::get('/genres/{genre}', 'GenresController@show');

Route::get('/directors', 'DirectorsController@index');
Route::get('/directors/{director}', 'DirectorsController@show');
Route::get('/directors/create', 'DirectorsController@create')->middleware('auth');
Route::post('/directors', 'DirectorsController@store');

Route::get('/ratings/{movie}', 'MovieRatingsController@show');
Route::put('/ratings/{movie}', 'MovieRatingsController@update');

Auth::routes();
