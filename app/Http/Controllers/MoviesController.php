<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        $movies = Movie::latest()->take(20)->get();

        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store()
    {
        $request = request()->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:10',
            'year' => 'required',
            'director' => 'required',
            'thumbnail' => 'required',
            'poster' => 'required',
            'duration' => 'nullable',
        ]);

        $request['created_by'] = auth()->id();

        Movie::create($request);

        return redirect('/movies');
    }

    public function show($slug)
    {
        $movie = Movie::whereSlug($slug)->first();

        return view('movies.show', compact('movie'));
    }

    public function edit($slug)
    {
        $movie = Movie::whereSlug($slug)->first();

        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $slug)
    {
        $movie = Movie::whereSlug($slug)->first();

        $request = request()->validate([
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:10',
            'year' => 'required',
            'director' => 'required',
            'thumbnail' => 'required',
            'poster' => 'required',
        ]);

        $movie->update($request);

        return redirect('/movies');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect('/movies');
    }
}
