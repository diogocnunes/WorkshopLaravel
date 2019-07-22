<?php

namespace App\Observers;

class MovieObserver
{
    public function saving($movie)
    {
        $movie->user_id = auth()->id();
    }
}
