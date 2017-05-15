<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Category;
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
                    ->orderBy($request->input('order'))
                    ->paginate(7);

            return view('articulos', ['articles' => $articles, 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]);
        }
        $articles = DB::table('articles')->paginate(7);
        return view('articulos', ['articles' => $articles, 'mensaje' => $request->input('msg'),
                                'order' => 'id']);
        
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
        return view('feed', ['articles' => $news, 'id' => $id, 'subs' => $subs, 'mensaje' => $mensaje, 
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
        return view('feed', ['articles' => $news, 'mensaje' => $mensaje, 'order' => 'name']); 
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

        return view('feed', ['articles' => $news, 'mensaje' => '',
                                'order' => 'name', 'id' => Auth::user()->id, 'subs' => []]); 
    }

    public function delete(Request $request){
        $mensaje = "";      
        
        try{
            $id = $request->input('id');
            $article = Article::findOrFail($id);
            $article->delete();

            $mensaje = "El articulo con ID " . $id . " ha sido borrado correctamente";
            return redirect()->action('articulosController@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar borrar el articulo";
            return redirect()->action('articulosController@index', ['msg' => $mensaje]);
        }
    }
}