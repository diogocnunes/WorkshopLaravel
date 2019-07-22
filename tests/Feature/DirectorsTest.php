<?php

namespace Tests\Feature;

use App\Director;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DirectorsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_browse_directors()
    {
        $this->actingAs(factory(User::class)->create());

        $director = factory(Director::class)->create(['name' => 'James Cameron']);

        $this->get('/directors')
            ->assertOk()
            ->assertViewIs('directors.index')
            ->assertSee($director->name);
    }

    /** @test */
    public function guests_cannot_create_directors()
    {
        $this->get('/directors/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_create_directors()
    {
        $this->actingAs(factory(User::class)->create());

        $this->get('/directors/create')
            ->assertOk()
            ->assertViewIs('directors.create');

        $data = [
            'name' => 'Spike Lee',
            'birthdate' => '1957-03-20',
        ];

        $this->post('/directors', $data)
            ->assertRedirect('/directors');
        $this->assertDatabaseHas('directors', $data);
    }

    /** @test */
    public function it_requires_a_name()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Director::class)->raw(['name' => null]);

        $this->post('/directors', $data)
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_requires_a_birthdate()
    {
        $this->actingAs(factory(User::class)->create());

        $data = factory(Director::class)->raw(['birthdate' => null]);

        $this->post('/directors', $data)
            ->assertSessionHasErrors('birthdate');
    }
}
