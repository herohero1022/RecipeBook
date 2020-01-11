<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

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

    public function testCreate()
    {
        $user = factory(User::class)->create();
        // $response = $this->post('/recipe/store', [
        //     'user_id' => '$user->id',
        //     'title' => 'aaaa',
        //     'image' => 'aaaa',
        //     'description' => 'aaaa',
        //     'status' => 'open'
        // ]);
        $response->assertRedirect('/material/new/1');
    }

    public function testPreview()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('recipe/preview');
        $response->assertStatus(200);
    }

    public function testSearch()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('search/index', [
            'keyword' => 'コロッケ'
        ]);
        $response->assertStatus(200);
    }

}
