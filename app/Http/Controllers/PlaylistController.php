<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Playlist;

class PlaylistController extends Controller
{
    public function index()
    {
        return view('playlist.index');
    }

    public function store()
    {
        $row = Playlist::whereMovieIdAndUserId(request('movie_id'), auth()->id())->exists();

        if ( ! $row) {
            auth()->user()->playlist()->attach(request('movie_id'));
        }

        return back();
    }

    public function update($slug)
    {
        $movie = Movie::whereSlug($slug)->firstOrFail();

        auth()->user()->playlist()->sync([$movie->id => ['watched' => now()->format('Y-m-d')]]);

        return back();
    }

    public function destroy()
    {
        auth()->user()->playlist()->detach(request('movie_id'));

        return back();
    }
}
