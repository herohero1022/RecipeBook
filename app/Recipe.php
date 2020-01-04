<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = ['title', 'image', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function materials()
    {
        return $this->hasMany('App\Material');
    }

    public function processes()
    {
        return $this->hasMany('App\Process');
    }
}
