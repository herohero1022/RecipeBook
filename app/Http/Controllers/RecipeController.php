<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $items = User::all();
        return view('recipe.index',['items' => $items]);
    }

    public function step1()
    {
        $user = Auth::user();
        $recipes = Recipe::all();
        return view('recipe.step1',['recipes' => $recipes, 'user' => $user]);
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
        return redirect('/recipe/step2');
    }

    public function step2()
    {
        return view('recipe.step2');
    }
}
