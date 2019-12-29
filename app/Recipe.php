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

    public function prosesses()
    {
        return $this->hasMany('App\Prosess');
    }
}
