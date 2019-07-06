<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('index');
});
Route::resource('movies', 'MovieController');
Route::resource('genres', 'GenreController');
Route::get('/genres/{genre}/movies', 'GenreController@movieByGenre');
