<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests\MovieRequest;

use App\Movie;
use Illuminate\Http\Response;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $genres = Genre::pluck('name', 'id');
        $movie = [];
        return view('movies.form', compact('genres', 'movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MovieRequest $request
     * @return Response
     */
    public function store(MovieRequest $request)
    {
        try {
            Movie::create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Created movie error']);
        }

        return redirect('/movies')->with('status', 'Movie created');
    }

    /**
     * Display the specified resource.
     *
     * @param Movie $movie
     * @return Response
     */
    public function show(Movie $movie)
    {
        return view('movies.view', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movie $movie
     * @return Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::pluck('name', 'id');
        return view('movies.form', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MovieRequest $request
     * @param Movie $movie
     * @return Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        try {
            $movie->update($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Updated movie error']);
        }

        return redirect('/movies')->with('status', 'Movie updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @return Response
     */
    public function destroy(Movie $movie)
    {
        try {
            $movie->delete();
        } catch (\Exception $e) {
            return redirect('/movies')->withErrors(['Deleted movie error']);
        }

        return redirect('/movies')->with('status', 'Movie deleted');
    }
}
