<?php

namespace App;


use Illuminate\Foundation\Auth\User as Model;

class User extends Model
{
    protected $primaryKey='idUser';
    private $password;
    private $email;
    public $name;
    
    public function bookmarks()
    {
        return $this -> hasMany('App\Bookmark');
    }
}
