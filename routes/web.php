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
Route::post('/recipe/material_store', 'RecipeController@material_store')->name('recipe.material_store');
Route::get('/recipe/step3/{recipe_id}', 'RecipeController@step3')->name('recipe.step3');
Route::post('/recipe/process_store', 'RecipeController@process_store')->name('recipe.process_store');
Route::get('/recipe/preview/{recipe_id}', 'RecipeController@preview')->name('recipe.preview');
Route::patch('/recipe/preview_store', 'RecipeController@preview_store')->name('recipe.preview_store');
Route::post('/recipe/close', 'RecipeController@close')->name('recipe.close');
Route::get('/recipe/edit/{recipe_id}', 'RecipeController@edit');
Route::get('/recipe/recipe_edit/{recipe_id}', 'RecipeController@recipe_edit');
Route::get('/recipe/matrial_edit/{recipe_id}', 'RecipeController@material_edit');
Route::get('/recipe/process_edit/{recipe_id}', 'RecipeController@process_edit');
Route::delete('/recipe/delete', 'RecipeController@delete')->name('recipe.delete');
