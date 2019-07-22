<?php

namespace Tests\Feature;

use App\Movie;
use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieRatingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cant_rate_a_movie()
    {
        $movie = factory(Movie::class)->create();

        $response = $this->post('/ratings/' . $movie->slug, []);

        $response->assertRedirect('/login');
    }

    /** @test */
    public function a_movie_has_ratings()
    {
        $movie = factory(Movie::class)->create();

        $this->assertInstanceOf(HasMany::class, $movie->ratings());
    }

    /** @test */
    public function authenticated_users_can_rate_a_movie()
    {
        $this->actingAs($user = factory(User::class)->create());

        $movie = factory(Movie::class)->create();

        $data = [
            'movie_id' => $movie->id,
            'user_id' => $user->id,
            'rating' => 2,
        ];

        $this->post('/ratings/' . $movie->id, $data);

        $this->assertDatabaseHas('ratings', $data);
    }
}
