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

use App\Twitter;

app()->singleton('example', function () {
    return new \App\Example;
});

Route::get('/', function () {
//Route::get('/', function(Twitter $twitter) {
//    dd(app('example'), app('example'));

//    dd(app('App\Example'));

//    dd(app('foo'));

//    dd($twitter);

    return view('index');
});

Route::group(["middleware" => "auth"], function () {
    Route::resource('movies', 'MovieController');
    Route::resource('genres', 'GenreController');
});

Route::get('/genres/{genre}/movies', 'GenreController@movieByGenre');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

View::share(
    'menu', App\Genre::all()->sortBy('name')
);