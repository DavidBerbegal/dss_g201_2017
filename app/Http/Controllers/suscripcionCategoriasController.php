<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Categorysubscription;

class suscripcionCategoriasController extends Controller
{
    public function index(Request $request) {
        if($request->has('categorysubscriptions')){
           return view('suscripcionCategorias', ['categorysubscriptions' => $request->input('categorysubscriptions'), 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]); 
        }
        if($request->has('order') && $request->input('order') != ""){
            
            $subs = DB::table('categorysubscriptions')
                    ->orderBy($request->input('order'))
                    ->paginate(7);

            return view('suscripcionCategorias', ['categorysubscriptions' => $subs, 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]);
        }
        $subs = DB::table('categorysubscriptions')->paginate(7);
        return view('suscripcionCategorias', ['categorysubscriptions' => $subs, 'mensaje' => $request->input('msg'),
                                'order' => 'id']);
        
    }
    public function delete(Request $request){
        $mensaje = "";

        try{
            $id = $request->input('id');
            $sub = CategorySubscription::findOrFail($id);
            $sub->delete();

            $mensaje = "La suscripción con ID " . $id . "ha sido borrada correctamente";
            return redirect()->action('suscripcionCategoriasController@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar borrar la suscripción";
            return redirect()->action('suscripcionCategoriasController@index', ['msg' => $mensaje]);
        }
    }

    public function deletePub(Request $request){
        $user_id = $request->input('user_id');
        $category_id = $request->input('category_id');
        $sub = CategorySubscription::where('user_id', $user_id)->
                where('category_id', $category_id)->first();
        $sub->delete();
        $mensaje = "Category eliminated from your subscriptions ";  

        return redirect()->action('usuariosController@showProfile')->with('mensaje', $mensaje);
    }
}