<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
