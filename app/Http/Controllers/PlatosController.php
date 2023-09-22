<?php

namespace App\Http\Controllers;

use App\Models\platos;
use Illuminate\Http\Request;

class PlatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platos=platos::all();
        return view('platos.index',['platos'=>$platos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('platos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj=new platos();
        if ($request->hasFile('imagen')){
            $file = request('imagen')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('imagen')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('imagen')->storeAs('platos/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->imagen = $archivo;
        }

        $obj->nombre_plato=request('nombre_plato');
        $obj->descripcion_plato=request('descripcion_plato');
        $obj->precio=request('precio');
        $obj->estado=request('estado');
        $obj->save();
        return redirect()->route('platos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(platos $platos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($platos)
    {
        $plato=platos::find($platos);
        return view('platos.edit',['plato'=>$plato]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=request('id');
        $obj=platos::findOrFail($id);
        if ($request->hasFile('imagen')){
            $file = request('imagen')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('imagen')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('imagen')->storeAs('platos/',$archivo,'public');//refiere carpeta publica es el nombre de disco
            $obj->imagen = $archivo;
        }
        $obj->nombre_plato=request('nombre_plato');
        $obj->descripcion_plato=request('descripcion_plato');
        $obj->precio=request('precio');
        $obj->estado=request('estado');
        $obj->save();
        return redirect()->route('platos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(platos $platos)
    {
        //
    }
}
