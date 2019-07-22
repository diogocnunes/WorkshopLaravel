<?php

namespace Tests\Feature;

use App\Genre;
use App\Movie;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MoviesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_genre()
    {
        $movie = factory(Movie::class)->create();
        $genre = Genre::create(['name' => 'Sci-fi']);

        $movie->genres()->attach($genre);

        $this->assertDatabaseHas('genre_movie', [
            'genre_id' => 1,
            'movie_id' => 1
        ]);
    }

    /** @test */
    public function users_can_browse_movies_by_its_slug()
    {
        $movie = factory(Movie::class)->create(['title' => 'Some Movie Title']);

        $this->get('/movies/' . $movie->slug)
            ->assertOk();
    }

    /** @test */
    public function unauthenticated_users_cannot_create_movies()
    {
        $movie = factory(Movie::class)->raw();

        $this->post('/movies', $movie);

        $this->assertDatabaseMissing('movies', $movie);
    }

    /** @test */
    public function authenticated_users_can_create_movies()
    {
        $user = factory(User::class)->create();
        $movie = factory(Movie::class)->raw();

        $this->actingAs($user)->post('/movies', $movie);

        $this->assertDatabaseHas('movies', $movie);
    }
}
