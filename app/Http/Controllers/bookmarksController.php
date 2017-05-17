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


class bookmarksController extends Controller
{
    public function listaBookmarks(Request $request){
       
        $user_id = Auth::user()->id;         
        $mensaje = "";

        $bookmarks = DB::table('bookmarks')->where('user_id',$user_id)->paginate(20);
        $articles_id = array();

        foreach ($bookmarks as $book){  
        array_push($articles_id,$book->article_id);
        }
        $news = Article::findMany($articles_id);
        
        return view('bookmarks', ['articles' => $news, 'mensaje' => $mensaje, 'order' => 'name']); 
    }

    public function addBookmark(Request $request){
       
        $sub = new Bookmark();
        $sub->user_id =  Auth::user()->id;
        $sub->article_id = $request->input('article_id');
        $sub->save();

        return back()->withInput();
    }

    public function deleteBookmark(Request $request){
        
        $user_id = Auth::user()->id;

        $article_id = $request->input('article_id');
        $book = Bookmark::where('user_id', $user_id)->
                where('article_id', $article_id)->first();
        $book->delete();

        return back()->withInput();
    }
}