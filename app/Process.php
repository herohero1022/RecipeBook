<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{

    // protected $table = 'prosess';

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
