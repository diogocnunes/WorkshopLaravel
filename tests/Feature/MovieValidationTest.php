<?php

namespace Tests\Feature;

use App\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class MovieValidationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs(factory(User::class)->create());
    }

    /** @test */
    public function it_requires_a_title()
    {
        $movie = factory(Movie::class)->raw(['title' => null]);

        $this->post('/movies', $movie)
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function it_requires_a_description()
    {
        $movie = factory(Movie::class)->raw(['description' => null]);

        $this->post('/movies', $movie)
            ->assertSessionHasErrors('description');
    }

    /** @test */
    public function it_requires_a_year()
    {
        $movie = factory(Movie::class)->raw(['year' => null]);

        $this->post('/movies', $movie)
            ->assertSessionHasErrors('year');
    }

    /** @test */
    public function it_requires_a_thumbnail()
    {
        $movie = factory(Movie::class)->raw(['thumbnail' => null]);

        $this->post('/movies', $movie)
            ->assertSessionHasErrors('thumbnail');
    }

    /** @test */
    public function it_requires_a_director()
    {
        $movie = factory(Movie::class)->raw(['director' => null]);

        $this->post('/movies', $movie)
            ->assertSessionHasErrors('director');
    }

    /** @test */
    public function it_requires_a_poster()
    {
        $movie = factory(Movie::class)->raw(['poster' => null]);

        $this->post('/movies', $movie)
            ->assertSessionHasErrors('poster');
    }
}
