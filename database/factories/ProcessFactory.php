<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Process;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Process::class, function (Faker $faker) {
    return [
        'recipe_id' => '1',
        'process' => 'あああああ',
        'order' => '1'
    ];
});
