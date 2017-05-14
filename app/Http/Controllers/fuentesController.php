<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Source;
use Carbon\Carbon;

class fuentesController extends Controller
{
    public function index(Request $request)
    {
        $mostrarFuentes = DB::table('sources')->paginate(5);
        return view('fuentes', ['fuentes' => $mostrarFuentes, 'mensaje' => $request->input('msg')]);
    }

    public function listSources(Request $request) 
    {
        if($request->has('fuentes'))
        {
            return view('fuentes', ['fuentes' => $request->input('fuentes'), 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]); 
        }
        if($request->has('order') && $request->input('order') != "")
        {
            $sources = DB::table('sources')
                    ->orderBy($request->input('order'))
                    ->paginate(5);
            return view('fuentes', ['fuentes' => $sources, 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]);
        }

        $fuentesAux = DB::table('sources')->paginate(5);
        return view('fuentes', ['fuentes' => $fuentesAux, 'mensaje' => $request->input('msg'),
                                'order' => 'id']);
    
    }

    public function listPublicSources(Request $request){
        $fuentesAux = DB::table('sources')->orderBy('name')->get();
        $subs = [];
        if(Auth::check()){
            $suscripciones = DB::table('sourcesubscriptions')->where('user_id', Auth::user()->id)->get();
            foreach($suscripciones as $sub){
                array_push($subs, $sub->source_id);
            }
        }
        return view('fuentesPub', ['fuentes' => $fuentesAux, 'mensaje' => '',
                                'order' => 'name', 'subs' => $subs]); 
    }

    public function searchPubSources(Request $request){
       
        $name = $request->input('sName');
        $sources = DB::table('sources')
            ->where('name','LIKE', "%$name%")->get();

        return view('fuentesPub', ['fuentes' => $sources, 'mensaje' => 'search',
                                'order' => 'name']);
        
    }

    public function showSource(Request $request)
    {
        $id = $request->input('id');
        $source = Source::findOrFail($id);

        return view('modificarFuente', ['id' => $id, 'name' => $source->name, 'description' => $source->description]);
    }

    public function create(Request $request)
    {
        $mensaje = "";
        $this->validate($request, [
            'api' => 'required',
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',
            'urlLogoSmall' => 'required',
            'urlLogoMedium' => 'required',
            'created_at' => 'required'
        ]);

        try 
        {
            $source = new Source();
            $source->api = $request->input('api');
            $source->name = $request->input('name');
            $source->description = $request->input('description');
            $source->url = $request->input('url');
            $source->urlLogoSmall = $request->input('urlLogoSmall');
            $source->urlLogoMedium = $request->input('urlLogoMedium');
            $source->created_at = Carbon::now();
            $source->save();

            $mensaje = "La fuente no ha sido creada correctamente";
            return redirect()->action('controllerSources@index', ['msg' => $mensaje]);
        }
        catch (QueryException $e)
        {
            $mensaje = "Error al crear la fuente";
            return redirect()->action('controllerSources@index', ['msg' => $mensaje]);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $mensaje = "";

        try
        {
            $id = $request->input('id');
            $source = Source::findOrFail($id);
            $source->name = $request->input('name');
            $source->description = $request->input('description');
            $source->created_at = Carbon::now();
            $source->save();

            $mensaje = "La fuente con ID " . $id . "se ha modificado correctamente";
            return redirect()->action('controllerSources@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Error al modificar la fuente";
            return redirect()->action('controllerSources@index', ['msg' => $e]);
        }
    }

    public function destroy(Request $request)
    {
        $mensaje = "";

        try
        {
            $id = $request->input('id');
            $source = Source::findOrFail($id);
            $source->delete();

            $mensaje = "La fuente con ID " . $id . "ha sido borrada correctamente";
            return redirect()->action('controllerSources@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar borrar la fuente";
            return redirect()->action('controllerSources@index', ['msg' => $mensaje]);
        }
    }
}