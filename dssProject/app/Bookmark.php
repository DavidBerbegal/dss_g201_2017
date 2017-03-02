<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $primaryKey='idBookmark';
    private $createdOn;
}
