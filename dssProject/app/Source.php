<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function sourcesubscriptions()
    {
        return $this->hasMany('App\Sourcesubscription');
    }

    protected $camposSource = [
        'name', 'description',
    ];

    /*
    public static function allSources() 
    {
        return DB::table('source');
    }

    public static function saveSource($source){
        $source->save();
    }

    public static function findSource($id){
        return Source::find($id);
    }

    public static function deleteSource($source){
        Source::find($source)->delete();
    }
    */
}
