<?php

namespace App;


use Illuminate\Foundation\Auth\User as Model;

class User extends Model
{
  
    public function bookmarks()
    {
        return $this -> hasMany('App\Bookmark');
    }
}
