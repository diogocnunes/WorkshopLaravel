<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Support\Str;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('name')->get();

        $movies = Movie::orderBy('title')->get();

        return view('genres.index', compact('genres', 'movies'));
    }

    public function show($slug)
    {
        $genre = Genre::whereName(Str::title($slug))->first();

        $genres = Genre::orderBy('name')->get();

        $movies = $genre->movies;

        return view('genres.show', compact('movies', 'genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:genres,name',
        ]);

        Genre::create(request(['name']));

        return redirect('/movies');
    }
}
