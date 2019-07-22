<?php

namespace Tests\Feature;

use App\Genre;
use App\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenresTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_movies()
    {
        $movies = factory(Movie::class, 5)->create();

        $genre = factory(Genre::class)->create();

        $movies->each(function ($movie) use ($genre) {
            return $movie->genres()->attach($genre);
        });

        $this->assertCount(5, $genre->movies);
    }

    /**
     * @test
     */
    public function users_can_browse_all_movies_from_a_specific_genre()
    {
        $this->withoutExceptionHandling();

        $comedyGenre = Genre::create(['name' => 'Comedy']);
        $dramaGenre = Genre::create(['name' => 'Drama']);

        $comedyMovie = factory(Movie::class)->create();
        $comedyMovie->genres()->attach($comedyGenre);

        $dramaMovie = factory(Movie::class)->create();
        $dramaMovie->genres()->attach($dramaGenre);

        $this->get($comedyGenre->path())
            ->assertSee($comedyMovie->path())
            ->assertDontSee($dramaMovie->path());
    }
}
