<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use App\Material;
use App\Process;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')
        ->except(['index', 'test']);
    }

    public function index()
    {
        $recipes = Recipe::where('status', 'open')->get();
        return view('recipe.index',['recipes' => $recipes]);
    }

    public function new()
    {
        $user = Auth::user();
        return view('recipe.new',['user' => $user]);
    }

    public function store(Request $request)
    {
        $recipe = new Recipe();
        $uploadImg = $request->image;
        $filePath = $uploadImg->store('public');
        $recipe->image = str_replace('public/', '', $filePath);
        $recipe->user_id = $request->user_id;
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->status = $request->status;
        $recipe->save();
        $id = $recipe->id;
        return redirect()->route('material.new', ['id' => $id]);
    }

    public function preview($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        $processes = Recipe::find($recipe_id)->processes->sortBy('order');
        return view('recipe.preview', compact('recipe', 'user', 'materials', 'processes'));
    }

    public function preview_store(Request $request) {
        $recipe_id = $request->recipe_id;
        Recipe::find($recipe_id)
        ->update(['status' => $request->status]);
        return redirect('/recipe');
    }

    public function close(Request $request) {
        $recipe_id = $request->recipe_id;
        Recipe::find($recipe_id)
        ->update(['status' => $request->status]);
        return redirect('/recipe');
    }

    public function edit ($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        $processes = Recipe::find($recipe_id)->processes->sortBy('order');
        return view('recipe.edit', compact('recipe', 'user', 'materials', 'processes'));
    }

    public function recipe_edit ($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        return view('recipe.recipe_edit', compact('recipe', 'user'));
    }

    public function recipe_update (Request $request)
    {
        $recipe_id = $request->recipe_id;
        $uploadImg = $request->image;
        $filePath = $uploadImg->store('public');
        $image = str_replace('public/', '', $filePath);
        Recipe::find($recipe_id)
        ->update(['title' => $request->title, 'image' => $image, 'description'=> $request->description]);
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        $processes = Recipe::find($recipe_id)->processes->sortBy('order');
        return view('recipe.edit', compact('recipe', 'user', 'materials', 'processes'));
    }

    public function delete(Request $request) {
        $recipe = Recipe::find($request->recipe_id);
        $recipe->delete();
        return redirect('/recipe');
    }

    public function test() {
        return view('recipe.test');
    }
}