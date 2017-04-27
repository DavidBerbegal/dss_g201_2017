<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Article;

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

    // vista pública para el feed principal
    public function listArticulosFeed(Request $request){
       
        $news = DB::table('articles')->orderBy('name')->paginate(20);
        return view('feed', ['articles' => $news, 'mensaje' => '',
                                'order' => 'name']); 
    }

    //búsqueda pública para el feed principal
    public function searchFeed(Request $request){
       
        $title = $request->input('sName');
        $news = DB::table('articles')
            ->where('title','LIKE', "%$title%")->paginate(20);

        return view('feed', ['articles' => $news, 'mensaje' => 'search',
                                'order' => 'name']); 
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