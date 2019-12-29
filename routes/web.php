<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@show');

Route::get('/recipe', 'RecipeController@index');
Route::get('/recipe/step1', 'RecipeController@step1');
Route::post('/recipe/store', 'RecipeController@store')->name('recipe.store');
Route::get('/recipe/step2/{id}', 'RecipeController@step2')->name('recipe.step2');


