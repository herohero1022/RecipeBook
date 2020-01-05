<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;

class SearchController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        $data = Recipe::query();
        if(!empty($keyword))
        {   
            $recipes = $data->where('title', 'like', '%'.$keyword.'%')->get();

        }else{
            $recipes = Recipe::all();
        }
        return view('search.index', compact('recipes', 'keyword'));
    }
}
