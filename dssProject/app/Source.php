<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function sourcesubscriptions()
    {
        return $this->hasMany('App\Sourcesubscription');
    }
}
