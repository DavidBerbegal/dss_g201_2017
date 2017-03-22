<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sourcesubscription extends Model
{
    

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function source()
    {
        return $this->belongsTo('App\Source');
    }
}
