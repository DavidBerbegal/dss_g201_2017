<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $primaryKey = 'idBookmark';
    private $createdOn;

    public function usuarios()
    {
        return $this->belongsTo('App\Users');
    }

    public function noticias()
    {
        return $this->belongsTo('App\News');
    }
}
