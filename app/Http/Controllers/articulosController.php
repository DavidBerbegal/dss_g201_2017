<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Category;
use App\Bookmark;
use App\Categorysubscription;

class articulosController extends Controller
{
    public function index(Request $request) {
        if($request->has('articles')){
           return view('articulos', ['articles' => $request->input('articles'), 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]); 
        }
        if($request->has('order') && $request->input('order') != ""){
            
            $articles = DB::table('articles')
                    ->join('sources','source_id','=','sources.id')
                    ->join('categories','category_id','=','categories.id')
                    ->select('articles.id as articleid','articles.author','articles.title','articles.date','articles.positiveRate','articles.negativeRate','articles.description','sources.name as source','categories.name as category')
                    ->orderBy($request->input('order'))
                    ->paginate(7);

            return view('articulos', ['articles' => $articles, 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]);
        }
        $articles = DB::table('articles')
                    ->join('sources','source_id','=','sources.id')
                    ->join('categories','category_id','=','categories.id')
                    ->select('articles.id as articleid','articles.author','articles.title','articles.date','articles.positiveRate','articles.negativeRate','articles.description','sources.name as source','categories.name as category')
                    ->paginate(7);
        return view('articulos', ['articles' => $articles, 'mensaje' => $request->input('msg'),
                                'order' => 'articlesid']);
        
    }

    public function buscaCategoria($idCat){

        $news = DB::table('articles')
            ->where('category_id','LIKE', "%$idCat%")->paginate(20);
        
        $categoria = Category::findOrFail($idCat);
        $mensaje = ucfirst($categoria->name);
        $id = $idCat;
        $subs = [];
        if(Auth::check()){
            $suscripciones = DB::table('categorysubscriptions')->where('user_id', Auth::user()->id)->get();
            foreach($suscripciones as $sub){
                array_push($subs, $sub->category_id);
            }
        }
        foreach ($news as $new){

            if((strlen($new->description)+strlen($new->title))> 130){
                $desc = substr($new->description, 0, 90). "...";
                $new->description = $desc;
            }
        }

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $bookmarks = DB::table('bookmarks')->where('user_id',$user_id)->paginate(20);
            $articles_id = array();
            foreach ($bookmarks as $book){  
            array_push($articles_id,$book->article_id);
            }
        }
        else{
            $articles_id = array();
        }
        return view('feed', ['articles' => $news, 'id' => $id,'articles_id' => $articles_id, 'subs' => $subs, 'mensaje' => $mensaje, 
                                'order' => 'name']);
    }

    // vista pública para el feed principal
    public function listArticulosFeed(Request $request){

        $mensaje = "";
        $news = DB::table('articles')->orderBy('name')->paginate(21);
        foreach ($news as $new){

            if((strlen($new->description)+strlen($new->title))> 130){
                $desc = substr($new->description, 0, 90). "...";
                $new->description = $desc;
            }
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
            $cats_ids = array();
            $sources_ids = array();
        }

        //$bookmarks = DB::table('bookmarks')->where('user_id',$user_id)->paginate(7);
        return view('feed', ['articles' => $news, 'articles_id' => $articles_id, 'mensaje' => $mensaje, 'order' => 'name']); 
    }

    public function mostrarSuscripciones(){

            $cats = DB::table('categorysubscriptions')->where('user_id',$user_id)->paginate(21);
            $sources = DB::table('sourcesubscriptions')->where('user_id',$user_id)->paginate(21);
            $cats_ids = array();
            $sources_ids = array();

            foreach ($cats as $cat){  
            array_push($cats_ids,$cat->category_id);
            }

            foreach ($sources as $sour){  
            array_push($sources_ids,$sour->source_id);
            }

            $categorySubs = Article::whereIn('category_id', $cats_ids)->get();

            return view('feed', ['articles' => $news, 'articles_id' => $articles_id, 'mensaje' => $mensaje, 'order' => 'name']); 

    }

    public function downvote(Request $request){
        $mensaje = "";      
        
        try{
            $id = $request->input('id');
            $article = Article::findOrFail($id);
            $article->negativeRate++;
            $article->save();
            return back()->withInput();
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar votar el artículo";
            return back()->withInput();
        }
    }

    public function upvote(Request $request){
        $mensaje = "";      
        
        try{
            $id = $request->input('id');
            $article = Article::findOrFail($id);
            $article->positiveRate++;
            $article->save();
            return back()->withInput();
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar votar el artículo";
            return back()->withInput();
        }
    }

    //búsqueda pública para el feed principal
    public function searchFeed(Request $request){
       
        $title = $request->input('sName');
        $news = DB::table('articles')
            ->where('title','LIKE', "%$title%")->paginate(20);

        foreach ($news as $new){

            if((strlen($new->description)+strlen($new->title))> 130){
                $desc = substr($new->description, 0, 90). "...";
                $new->description = $desc;
            }
        }

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $bookmarks = DB::table('bookmarks')->where('user_id',$user_id)->paginate(20);
            $articles_id = array();
            foreach ($bookmarks as $book){  
            array_push($articles_id,$book->article_id);
            }
        }
        else{
            $articles_id="";
        }

        return view('feed', ['articles' => $news, 'articles_id' => $articles_id,'mensaje' => '',
                                'order' => 'name', 'id' => Auth::user()->id, 'subs' => []]); 
    }

    public function delete(Request $request){
        $mensaje = "";      
        
        try{
            $id = $request->input('id');
            $article = Article::findOrFail($id);
            $article->delete();

            $mensaje = "El articulo con ID " . $id . " ha sido borrado correctamente";
            return redirect()->action('articulosController@index')->with('msg' , $mensaje);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar borrar el articulo";
            return redirect()->action('articulosController@index')->with('msg' , $mensaje);
        }
    }
}