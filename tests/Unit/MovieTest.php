<?php

namespace Tests\Unit;

use App\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_a_slug()
    {
        $movie = factory(Movie::class)->create(['title' => 'Foo Title']);

        $this->assertEquals('foo-title', $movie->slug);
    }

    /**
     * @test
     */
    public function it_has_a_path()
    {
        $movie = factory(Movie::class)->create(['title' => 'Foo Title']);

        $this->assertEquals('/movies/foo-title', $movie->path());
    }
}
