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
    public function index()
    {
        $recipes = Recipe::where('status', 'open')->get();
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
        $recipe->status = $request->status;
        $recipe->save();
        $id = $recipe->id;
        return redirect()->route('material.new', ['id' => $id]);
    }

    public function step3($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        return view('recipe.step3', compact('recipe', 'user', 'materials'));
    }

    public function process_store(Request $request)
    {
        $number = count($request->order);
        $recipe_id = $request->recipe_id;
        for ($n = 0; $n < $number; $n++) {
        $process = new Process;
        $process->recipe_id = $recipe_id;
        $process->order = $request->order[$n];
        $process->process = $request->process[$n];
        $process->save();
        }
        return redirect()->route('recipe.preview', ['recipe_id' => $recipe_id]);
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

    public function process_edit ($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        $processes = Recipe::find($recipe_id)->processes->sortBy('order');
        return view('recipe.process_edit', compact('recipe', 'user', 'materials', 'processes'));
    }

    public function process_update (Request $request)
    {
        $process = Process::where('recipe_id','=',$request->recipe_id)->delete();
        $number = count($request->order);
        $recipe_id = $request->recipe_id;
        for ($n = 0; $n < $number; $n++) {
        $process = new Process;
        $process->recipe_id = $recipe_id;
        $process->process = $request->process[$n];
        $process->order = $request->order[$n];
        $process->save();
        }
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
}