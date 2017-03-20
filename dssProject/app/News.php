<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

   public function bookmarks()
   {
       return $this->hasMany('App\Bookmark');
   }
}
