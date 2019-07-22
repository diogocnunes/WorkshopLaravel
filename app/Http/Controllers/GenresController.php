<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Genre::create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Created genre error']);
        }

        return redirect('/genres')->with('status', 'Genre created');
    }

    /**
     * Display the specified resource.
     *
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view('genres.view', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('genres.form', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        try {
            $genre->update($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Updated genre error']);
        }

        return redirect('/genres')->with('status', 'Genre updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        try {
            $genre->delete();
        } catch (\Exception $e) {
            return redirect('/genres')->withErrors(['Deleted genre error']);
        }

        return redirect('/genres')->with('status', 'Genres deleted');
    }

    public function movies($id)
    {
        $genre = Genre::findOrFail($id);
        $movies = $genre->movies;
        return view('genres.movies', compact('genre', 'movies'));
    }
}
