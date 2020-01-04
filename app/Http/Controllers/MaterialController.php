<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use App\Material;
use App\Process;

class MaterialController extends Controller
{
    public function new($id)
    {
        $recipe_id = $id;
        return view('material.new', ['recipe_id' => $recipe_id]);
    }

    public function store(Request $request)
    {
        $number = count($request->ingredients);
        $recipe_id = $request->recipe_id;
        for ($n = 0; $n < $number; $n++) {
        $material = new Material;
        $material->recipe_id = $recipe_id;
        $material->ingredients = $request->ingredients[$n];
        $material->quantity = $request->quantity[$n];
        $material->save();
        }
        return redirect()->route('recipe.step3', ['recipe_id' => $recipe_id]);
    }

    public function edit ($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        return view('material.edit', compact('recipe', 'user', 'materials'));
    }

    public function update (Request $request)
    {
        $material = Material::where('recipe_id','=',$request->recipe_id)->delete();
        $number = count($request->ingredients);
        $recipe_id = $request->recipe_id;
        for ($n = 0; $n < $number; $n++) {
        $material = new Material;
        $material->recipe_id = $recipe_id;
        $material->ingredients = $request->ingredients[$n];
        $material->quantity = $request->quantity[$n];
        $material->save();
        }
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        $processes = Recipe::find($recipe_id)->processes->sortBy('order');
        return view('recipe.edit', compact('recipe', 'user', 'materials', 'processes'));
    }
}
