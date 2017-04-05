<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Source;

class controllerSources extends Controller
{
    public function index(Request $request)
    {
        $mostrarFuentes = DB::table('sources')->paginate(10);
        return view('fuentes', ['fuentes' => $mostrarFuentes, 'mensaje' => $request->input('msg')]);
    }

    public function create(Request $request)
    {
        $mensaje = "";
        $this->validate($request, [
            'name' => required|name,
            'description' => required|description
        ]);

        try 
        {
            $source = new Source();
            $source->name = $request->input('name');
            $source->description = $request->input('description');
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

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $source = Source::findOrFail($id);
        
        return view('modificarFuente', ['id' => $id, 'name' => $source->name, 'description' => $source->description]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => required|name,
            'description' => required|description
        ]);

        $mensaje = "";

        try 
        {
            $id = $request->input('id');
            $source = Source::findOrFail($id);
            $source->name = $request->input('name');
            $source->description = $request->input('description');
            $source->save();

            $mensaje = "La fuente con ID " . $id . "se ha modificado correctamente";
            return redirect()->action('controllerSources@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Error al modificar la fuente";
            return redirect()->action('controllerSources@index', ['msg' => $mensaje]);
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