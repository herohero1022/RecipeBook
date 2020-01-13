<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Recipe;
use App\Material;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class ProcessTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNew()
    {
        $user = User::find(5);
        $recipe = Recipe::find(1);
        $materials = $recipe->materials;
        $response = $this->actingAs($user)->get('process/new/1');
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $user = User::find(5);
        $recipe = Recipe::find(1);
        $materials = $recipe->materials;
        $processes = $recipe->processes;
        $response = $this->actingAs($user)->get('process/edit/1');
        $response->assertStatus(200);
    }
}
