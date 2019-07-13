<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:5|max:255',
            'description' => ['required','min:10'],
            'genre_id' => 'required'
        ]);

        $fields = $request->all();
        $fields['user_id'] = auth()->id();

        Movie::create($fields);

        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $this->authorize('view', $movie);

        $genres = Genre::all();

        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Movie $movie)
    {

        request()->validate([
            'title' => 'required|min:5|max:255',
            'description' => ['required','min:10'],
            'genre_id' => 'required'
        ]);

        $fields = request(['id','genre_id', 'title', 'description','year']);
        $fields['user_id'] = auth()->id();

        $movie->update($fields);

        return redirect('/movies/'.$movie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Movie $movie
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect('/movies');
    }
}
