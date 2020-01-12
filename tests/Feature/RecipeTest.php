<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Recipe;
use App\Materials;
use App\Process;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class RecipeTest extends TestCase
{

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
        $user = User::find(5);
        $response = $this->actingAs($user)->get('recipe/new');
        $response->assertStatus(200);
    }

    public function testPreview()
    {
        $user = User::find(5);
        $recipe = Recipe::find(1);
        $materials = $recipe->materials;
        $processes = $recipe->processes;
        $response = $this->actingAs($user)->get('recipe/preview/1');
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $user = User::find(5);
        $recipe = Recipe::find(1);
        $materials = $recipe->materials;
        $processes = $recipe->processes;
        $response = $this->actingAs($user)->get('recipe/edit/1');
        $response->assertStatus(200);
    }

    public function testRecipeEdit()
    {
        $user = User::find(5);
        $recipe = Recipe::find(1);
        $response = $this->actingAs($user)->get('recipe/recipe_edit/1');
        $response->assertStatus(200);
    }

}
