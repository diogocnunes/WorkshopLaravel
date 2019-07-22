<?php

namespace Tests\Unit;

use App\Director;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class DirectorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_name()
    {
        $attributes = ['name' => 'Steven Spielberg'];

        factory(Director::class)->create($attributes);

        $this->assertDatabaseHas('directors', $attributes);
    }

    /** @test */
    public function it_has_a_birthdate()
    {
        $attributes = ['birthdate' => '1946-12-18'];

        $director = factory(Director::class)->create($attributes);

        $this->assertDatabaseHas('directors', $attributes);
        $this->assertInstanceOf(Carbon::class, $director->birthdate);
    }
}
