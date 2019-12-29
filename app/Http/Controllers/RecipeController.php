<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use App\Matelial;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipe.index',['recipes' => $recipes]);
    }

    public function step1()
    {
        $user = Auth::user();
        return view('recipe.step1',['user' => $user]);
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
        $recipe->save();
        $id = $recipe->id;
        return redirect()->route('recipe.step2', ['id' => $id]);
    }

    public function step2($id)
    {
        $recipe_id = $id;
        return view('recipe.step2', ['recipe_id' => $recipe_id]);
    }
}
