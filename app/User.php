<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }
    public function sourcesubscriptions()
    {
        return $this->hasMany('App\Sourcesubscription');
    }
    public function categorysubscriptions()
    {
        return $this->hasMany('App\Categorysubscription');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'privilegios',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
