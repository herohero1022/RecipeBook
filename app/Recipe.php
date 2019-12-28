<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function materials()
    {
        return $this->hasMany('App\Material');
    }
}
