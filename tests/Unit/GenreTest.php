<?php

namespace Tests\Unit;

use App\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_a_path()
    {
        $genre = factory(Genre::class)->create();

        $this->assertEquals('/genres/' . $genre->slug, $genre->path());
    }

    /**
     * @test
     */
    public function it_has_a_name()
    {
        $genre = Genre::create(['name' => 'Sci-fi']);

        $this->assertDatabaseHas('genres', $genre->toArray());

        $this->assertEquals('Sci-fi', $genre->name);
    }

    /**
     * @test
     */
    public function it_has_a_slug()
    {
        $genre = Genre::create(['name' => 'Sci-fi']);

        $this->assertDatabaseHas('genres', $genre->toArray());

        $this->assertEquals('sci-fi', $genre->slug);
    }
}
