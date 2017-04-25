<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function source()
    {
        return $this->belongsTo('App\Source');
    }
}
