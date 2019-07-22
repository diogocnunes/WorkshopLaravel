<?php

namespace Tests\Feature;

use App\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_movie_id()
    {
        $rating = factory(Rating::class)->create(['movie_id' => 1]);

        $this->assertDatabaseHas('ratings', $rating->toArray());
    }

    /** @test */
    public function it_has_a_rating_value()
    {
        $rating = factory(Rating::class)->create(['rating' => 5]);

        $this->assertDatabaseHas('ratings', $rating->toArray());
    }

    /** @test */
    public function it_has_a_user_id()
    {
        $rating = factory(Rating::class)->create(['user_id' => 1]);

        $this->assertDatabaseHas('ratings', $rating->toArray());
    }
}
