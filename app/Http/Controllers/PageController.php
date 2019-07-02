<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
        $movies = Movie::all();
        return view('welcome')->withMovies($movies);
    }
}
