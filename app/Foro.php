<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Foro extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
