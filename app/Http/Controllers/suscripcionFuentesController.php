<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Sourcesubscription;

class suscripcionFuentesController extends Controller
{
    public function index(Request $request) {
        if($request->has('sourcesubscriptions')){
           return view('suscripcionFuentes', ['sourcesubscriptions' => $request->input('sourcesubscriptions'), 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]); 
        }
        if($request->has('order') && $request->input('order') != ""){
            
            $subs = DB::table('sourcesubscriptions')
                    ->orderBy($request->input('order'))
                    ->paginate(7);

            return view('suscripcionFuentes', ['sourcesubscriptions' => $subs, 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]);
        }
        $subs = DB::table('sourcesubscriptions')->paginate(7);
        return view('suscripcionFuentes', ['sourcesubscriptions' => $subs, 'mensaje' => $request->input('msg'),
                                'order' => 'id']);
        
    }
    public function delete(Request $request){
        $mensaje = "";

        try{
            $id = $request->input('id');
            $sub = SourceSubscription::findOrFail($id);
            $sub->delete();

            $mensaje = "La suscripción con ID " . $id . "ha sido borrada correctamente";
            return redirect()->action('suscripcionFuentesController@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar borrar la suscripción";
            return redirect()->action('suscripcionFuentesController@index', ['msg' => $mensaje]);
        }
    }

    public function deletePub(Request $request){
        $user_id = $request->input('user_id');
        $source_id = $request->input('source_id');
        $sub = SourceSubscription::where('user_id', $user_id)->
                where('source_id', $source_id)->first();
        $sub->delete();
        $mensaje = "Source eliminated from your subscriptions ";  

        return redirect()->action('usuariosController@showProfile')->with('mensaje', $mensaje);
    }
}