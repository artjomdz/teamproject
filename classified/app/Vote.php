<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function answers()
    {
        return $this->belongsTo('\App\Answer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
