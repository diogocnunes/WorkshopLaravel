<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_have_a_default_homepage_view()
    {
        $this->withoutExceptionHandling()->get('/')
            ->assertViewIs('index');
    }

    /** @test */
    public function authenticated_users_have_a_dashboard_homepage_view()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->withoutExceptionHandling()->get('/')
            ->assertViewIs('dashboard');
    }
}
