<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Categorysubscription;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Model;
use App\Article;
use App\User;
use App\Bookmark;

class suscriptionsFeedController extends Controller
{
    public function listaSuscripciones(Request $request){
       
        $user_id = Auth::user()->id;       
            $cats = DB::table('categorysubscriptions')->where('user_id',$user_id)->paginate(21);
            $sources = DB::table('sourcesubscriptions')->where('user_id',$user_id)->paginate(21);
            $cats_ids = array();
            $sources_ids = array();
            $articles_id = array();
            $mensaje = "";

            foreach ($cats as $cat){  
            array_push($cats_ids,$cat->category_id);
            }

            foreach ($sources as $sour){  
            array_push($sources_ids,$sour->source_id);
            }

            if(Auth::check()){
                $user_id = Auth::user()->id;
                $bookmarks = DB::table('bookmarks')->where('user_id',$user_id)->paginate(21);
                $articles_id = array();

                foreach ($bookmarks as $book){  
                array_push($articles_id,$book->article_id);
                }
            }
            else{
                $articles_id = array();
            }
         
            $news = Article::whereIn('category_id', $cats_ids)->get();

            foreach ($news as $new){

                if((strlen($new->description)+strlen($new->title))> 130){
                    $desc = substr($new->description, 0, 90). "...";
                    $new->description = $desc;
                }
            }

            return view('suscriptionsFeed', ['articles' => $news, 'articles_id' => $articles_id, 'mensaje' => $mensaje, 'order' => 'name']); 
    }
}