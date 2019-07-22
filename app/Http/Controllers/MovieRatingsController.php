<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Rating;

class MovieRatingsController extends Controller
{
    public function show($id)
    {
        $movie = Movie::whereId($id)->firstOrFail();

        $votes = $movie->ratings->count();

        $ratings = auth()->check()
                    ? $movie->ratings->where('user_id', auth()->id())->pluck('rating')
                    : $movie->ratings->pluck('rating');

        return [
            'ratings' => $ratings,
            'votes' => $votes,
            'average' => $movie->ratings->average('rating'),
        ];
    }

    public function update($id)
    {
        $movie = Movie::whereId($id)->firstOrFail();

        $rating = Rating::firstOrNew([
            'user_id' => auth()->id(),
            'movie_id' => $movie->id,
        ]);

        $rating->rating = request('vote');

        $rating->save();

        return $movie->ratings->average('rating');
    }
}
