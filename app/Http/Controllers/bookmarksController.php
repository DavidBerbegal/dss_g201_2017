<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Categorysubscription;
use App\Bookmark;
use App\Article;

class bookmarksController extends Controller
{
    public function listaBookmarks(Request $request){
       
       $id = Auth::user()->id;
       //$suscripciones = Categorysubscription::where('user_id', $id)->get();
            
        $sub = new Bookmark();
        $sub->user_id = $request->input('source_id');
        $sub->user_id =  Auth::user()->id;
        $sub->save();

        $mensaje = "";
        $news = DB::table('articles')->orderBy('name')->paginate(21);
        foreach ($news as $new){

            if((strlen($new->description)+strlen($new->title))> 130){
                $desc = substr($new->description, 0, 90). "...";
                $new->description = $desc;
            }
        }
        return view('feed', ['articles' => $news, 'mensaje' => $mensaje, 'order' => 'name']); 
    }

    public function  addPub(Request $request){
       
        $sub = new Bookmark();
        $sub->user_id =  Auth::user()->id;
        $sub->article_id = $request->input('article_id');
        $sub->save();
        $source = Source::where('id', $request->input('source_id'))->first();
        $mensaje = "You have suscribed to " . $source->name;
        return redirect()->action('fuentesController@listPublicSources')->with('mensaje', $mensaje);
    }
}