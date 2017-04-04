<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerSources extends Controller
{
    public function index()
    {
        $mostrarFuentes = DB::table('sources')->paginate(10);
        return view('fuentes', ['fuentes' => $mostrarFuentes]);
    }

    public function create()
    {
        return view('nuevaFuente');
    }

    public function store(Request $request)
    {
        $fuente = new Source();
        $fuente->name = $request->input('name');
        $fuente->description = $request->input('description');
        $fuente->url = $request->input('url');

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|description|unique:sources,name',
            'url' => 'required|digits:8'
        ]);

        Source::saveSource($source);
        return redirect()->route('/fuentes');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $editarFuente = Source::findSource($id);
        return view('modificarFuente');
    }

    public function update(Request $request, $id)
    {
        $sourceUpdate = User::findSource($id);
        $sourceUpdate->name = $request->input('name');
        $sourceUpdate->description = $request->input('description');
        $sourceUpdate->url = $request->input('url');

        // If validation fails, redirects automatically to the form
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|email|unique:sources,name',
            'url' => 'required|digits:8',
        ]);

        Source::saveSource($sourceUpdate);
        return redirect()->route('/fuentes');
    }

    public function destroy($id)
    {
        Source::deleteSource($id);
        return redirect()->route('/fuentes');
    }
}