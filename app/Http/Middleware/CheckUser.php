<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Recipe;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentuser = Auth::user();
        $recipe = Recipe::find($request->recipe_id);
        if ($recipe->user_id != $currentuser->id){
            return redirect('/');
        }
        return $next($request);
    }
}
