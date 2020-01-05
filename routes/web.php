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

Route::get('/', 'RecipeController@index');

// Route::get('home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@show');

Route::get('/recipe', 'RecipeController@index');
Route::get('/recipe/test', 'RecipeController@test');
Route::get('/recipe/new', 'RecipeController@new')->name('recipe.new');
Route::post('/recipe/store', 'RecipeController@store')->name('recipe.store');
Route::get('/recipe/preview/{recipe_id}', 'RecipeController@preview')->name('recipe.preview');
Route::patch('/recipe/preview_store', 'RecipeController@preview_store')->name('recipe.preview_store');
Route::post('/recipe/close', 'RecipeController@close')->name('recipe.close');
Route::get('/recipe/edit/{recipe_id}', 'RecipeController@edit');
Route::get('/recipe/recipe_edit/{recipe_id}', 'RecipeController@recipe_edit');
Route::patch('/recipe/recipe_update/', 'RecipeController@recipe_update')->name('recipe.update');
Route::delete('/recipe/delete', 'RecipeController@delete')->name('recipe.delete');

Route::get('/material/new/{id}', 'MaterialController@new')->name('material.new');
Route::post('/material/store', 'MaterialController@store')->name('material.store');
Route::get('/material/edit/{recipe_id}', 'MaterialController@edit')->name('material.edit');
Route::post('/material/update/', 'MaterialController@update')->name('material.update');

Route::get('/process/new/{recipe_id}', 'ProcessController@new')->name('process.new');
Route::post('/process/store', 'ProcessController@store')->name('process.store');
Route::get('/process/edit/{recipe_id}', 'ProcessController@edit')->name('process.edit');
Route::post('/process/update/', 'ProcessController@update')->name('process.update');

Route::get('/search', 'SearchController@index')->name('search.index');
