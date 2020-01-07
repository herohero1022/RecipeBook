<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use App\Material;
use App\Process;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($user_id)
    {
        $currentuser = Auth::user();
        $user = User::find($user_id);
        if ($currentuser->id == $user->id) {
            $recipes = Recipe::where('user_id', $user->id)->paginate(6);
            $new_recipes = Recipe::where('user_id', $user->id)->latest()->get();
        }else {
            $recipes = Recipe::where('user_id', $user->id)->where('status', 'open')->paginate(6);
            $new_recipes = Recipe::where('user_id', $user->id)->where('status', 'open')->latest()->get();
        }
        return view('user.show', compact('currentuser', 'user', 'recipes', 'new_recipes'));
    }
}