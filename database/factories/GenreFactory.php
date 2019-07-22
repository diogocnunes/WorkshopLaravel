<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Genre;

$factory->define(Genre::class, function (Faker $faker) {
    return [
        'name' => $faker->word()
    ];
});
