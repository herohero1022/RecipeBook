<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class RecipeTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testNew()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('recipe/new');
        $response->assertStatus(200);
    }
}
