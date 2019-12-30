<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
