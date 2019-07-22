<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Movie;
use App\Rating;
use App\User;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'movie_id' => factory(Movie::class),
        'rating' => $faker->numberBetween(1, 5),
        'user_id' => factory(User::class),
    ];
});
