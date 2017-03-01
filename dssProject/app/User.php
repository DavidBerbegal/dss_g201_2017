<?php

namespace App;


use Illuminate\Foundation\Auth\User as Model;

class User extends Model
{
    protected $primaryKey='idUser';
    private $password;
    private $email;
    private $name;
    
}
