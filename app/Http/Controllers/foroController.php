<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Foro;
use Carbon\Carbon;

class foroController extends Controller
{
    public function index(Request $request)
    {
        $mostrarForo = DB::table('foro')->paginate(8);
        return view('foro', ['foro' => $mostrarForo, 'mensaje' => $request->input('msg')]);
    }

    public function listForo(Request $request) 
    {
        if($request->has('foro'))
        {
            return view('foro', ['foro' => $request->input('foro'), 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]); 
        }
        if($request->has('order') && $request->input('order') != "")
        {
            $foro = DB::table('foro')
                    ->orderBy($request->input('order'))
                    ->paginate(8);
            return view('foro', ['foro' => $foro, 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]);
        }

        $foroAux = DB::table('foro')->paginate(8);
        return view('foro', ['foro' => $foroAux, 'mensaje' => $request->input('msg'),
                                'order' => 'id']);
    }

    public function create(Request $request)
    {
        $mensaje = "";

        $this->validate($request, [
            'titulo' => 'required',
            'comentario' => 'required',
        ]);

        try 
        {
            $foro = new Foro();
            $foro->titulo = $request->input('titulo');
            $foro->comentario = $request->input('comentario');
            $foro->autor = Auth::User()['name'];
            $foro->created_at = Carbon::now();
            $foro->save();

            $mensaje = "El comentario no ha sido creado correctamente";
            return redirect()->action('foroController@index', ['msg' => $mensaje]);
        }
        catch (QueryException $e)
        {
            $mensaje = "Error al crear el comentario";
            return redirect()->action('foroController@index', ['msg' => $mensaje]);
        }
    }

    public function destroy(Request $request)
    {
        $mensaje = "";

        try
        {
            $id = $request->input('id');
            $foro = Foro::findOrFail($id);
            $foro->delete();

            $mensaje = "El comentario con ID " . $id . "ha sido borrado correctamente";
            return redirect()->action('foroController@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar borrar el comentario";
            return redirect()->action('foroController@index', ['msg' => $mensaje]);
        }
    }
}
