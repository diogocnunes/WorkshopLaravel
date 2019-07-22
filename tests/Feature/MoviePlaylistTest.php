<?php

namespace Tests\Feature;

use App\Movie;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MoviePlaylistTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function guests_do_not_have_a_playlist()
    {
        $this->get('/playlist')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function authenticated_users_have_a_playlist()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get('/playlist')
            ->assertOk()
            ->assertViewIs('playlist.index');
    }

    /**
     * @test
     */
    public function authenticated_users_can_add_a_movie_to_the_playlist()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $movie = factory(Movie::class)->create();

        $this->post('/playlist', ['movie_id' => $movie->id]);

        $this->assertDatabaseHas('playlist', ['user_id' => $user->id, 'movie_id' => $movie->id]);
    }

    /**
     * @test
     */
    public function guests_cannot_add_movies_to_playlist()
    {
        $this->post('/playlist', [])
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function authenticated_users_can_remove_a_movie_from_the_playlist()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $movie = factory(Movie::class)->create();

        $this->delete('/playlist', ['movie_id' => $movie->id]);

        $this->assertDatabaseMissing('playlist', ['user_id' => $user->id, 'movie_id' => $movie->id]);
    }

    /**
     * @test
     */
    public function authenticated_users_cannot_add_the_same_movie_to_the_playlist_twice()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->actingAs($user);

        $movie = factory(Movie::class)->create();

        $this->post('/playlist', ['movie_id' => $movie->id]);

        $this->assertDatabaseHas('playlist', ['user_id' => $user->id, 'movie_id' => $movie->id]);

        $this->post('/playlist', ['movie_id' => $movie->id]);

        $this->assertCount(1, $user->playlist);
    }

    /**
     * @test
     */
    public function authenticated_users_have_unwatched_movies_in_playlist()
    {
        $user = factory(User::class)->create();

        $movie = factory(Movie::class)->create();

        $user->playlist()->attach($movie);

        $this->assertDatabaseHas('playlist', [
            'user_id' => $user->id,
            'movie_id' => $movie->id,
            'watched' => null
        ]);
    }

    /**
     * @test
     */
    public function authenticated_users_can_set_a_movie_as_watched()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $movie = factory(Movie::class)->create();

        $user->playlist()->attach($movie);

        $this->patch('/playlist/' . $movie->slug);

        $this->assertDatabaseHas('playlist', [
            'user_id' => $user->id,
            'movie_id' => $movie->id,
            'watched' => now()->format('Y-m-d')
        ]);
    }

    /**
     * @test
     */
    public function guests_cannot_set_a_movie_as_watched()
    {
        $this->patch('/playlist/some-movie', [])
            ->assertRedirect('/login');
    }
}
