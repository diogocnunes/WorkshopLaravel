<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Movie;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'year' => $faker->year(),
        'thumbnail' => $faker->sentence(),
        'poster' => $faker->sentence(),
        'director' => $faker->name(),
        'duration' => $faker->time()
    ];
});
