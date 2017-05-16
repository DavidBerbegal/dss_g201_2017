<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Foro extends Model
{
    protected $table = 'foro';
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
