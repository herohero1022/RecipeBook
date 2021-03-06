<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use App\Material;
use App\Process;

class ProcessController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkuser')
        ->only(['edit']);
    }

    public function new($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        return view('process.new', compact('recipe', 'user', 'materials'));
    }

    public function store(Request $request)
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

    public function edit ($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);
        $user = Recipe::find($recipe_id)->user;
        $materials = Recipe::find($recipe_id)->materials;
        $processes = Recipe::find($recipe_id)->processes->sortBy('order');
        return view('process.edit', compact('recipe', 'user', 'materials', 'processes'));
    }

    public function update (Request $request)
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
}
