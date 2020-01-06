<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request) {
        $currentuser = Auth::user();
        $new_recipes = Recipe::where('status', 'open')->latest()->get();
        $keyword = $request->input('keyword');
        $data = Recipe::query();
        if(!empty($keyword))
        {   
            $recipes = $data->where('title', 'like', '%'.$keyword.'%')->paginate(6);

        }else{
            $recipes = Recipe::paginate(6);
        }
        return view('search.index', compact('recipes', 'keyword', 'currentuser', 'new_recipes'));
    }
}
