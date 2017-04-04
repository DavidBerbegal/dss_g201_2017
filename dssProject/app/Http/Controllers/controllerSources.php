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
        /*
        $this->validate($request, [
        'name' => 'required|min:5'
        ]);

        Source::create($request->all());
        return redirect('fuentes');
        */
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}