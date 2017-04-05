<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Category;
use Carbon\Carbon;

class categoriasController extends Controller
{
    public function index(Request $request)
    {
        $mostrarCategorias = DB::table('categories')->paginate(5);
        return view('categorias', ['categorias' => $mostrarCategorias, 'mensaje' => $request->input('msg')]);
    }

    public function create(Request $request)
    {

        $mensaje = "";
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required'
        ]);

        try
        {
            $category = new Category();
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->created_at = Carbon::now();
            $category->save();


            $mensaje = "La categoria ha sido creada correctamente";
            return redirect()->action('categoriasController@index', ['msg' => $mensaje]);
        }
        catch (QueryException $e)
        {
            $mensaje = "Error al crear la categoria";
            return redirect()->action('categoriasController@index', ['msg' => $mensaje]);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $category = Category::findOrFail($id);
        
        return view('modificarCategoria', ['id' => $id, 'name' => $category->name, 'description' => $category->description]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|name',
            'description' => 'required|description',
            'created_at' => 'required|created_at'
        ]);

        $mensaje = "";

        try 
        {
            $id = $request->input('id');
            $category = Category::findOrFail($id);
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();

            $mensaje = "La categoria con ID " . $id . "se ha modificado correctamente";
            return redirect()->action('categoriasController@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Error al modificar la categoria";
            return redirect()->action('categoriasController@index', ['msg' => $mensaje]);
        }
    }

    public function destroy(Request $request)
    {
        $mensaje = "";

        try
        {
            $id = $request->input('id');
            $category = Category::findOrFail($id);
            $category->delete();

            $mensaje = "La categoria con ID " . $id . "ha sido borrada correctamente";
            return redirect()->action('categoriasController@index', ['msg' => $mensaje]);
        }
        catch (ModelNotFoundException $e)
        {
            $mensaje = "Ha ocurrido un error al intentar borrar la categoria";
            return redirect()->action('categoriasController@index', ['msg' => $mensaje]);
        }
    }
}