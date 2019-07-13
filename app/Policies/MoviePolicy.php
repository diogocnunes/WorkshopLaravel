<?php

namespace App\Policies;

use App\User;
use App\Movie;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;
    
    public function view(User $user, Movie $movie)
    {
        return $movie->user_id === $user->id;
    }
}
