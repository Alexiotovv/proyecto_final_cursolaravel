<?php

namespace App\Http\Controllers;

use App\Models\mesas;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesas=mesas::all();
        return view('mesas.index',['mesas'=>$mesas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $obj=new mesas();
        $obj->nombre_mesa=request('nombre_mesa');
        $obj->descripcion_mesa=request('descripcion_mesa');
        $obj->save();
        return redirect()->route('mesas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(mesas $mesas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mesas)
    {
        $mesa=mesas::find($mesas);
        return view('mesas.edit',['mesa'=>$mesa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=request('id');
        $obj=mesas::findOrFail($id);
        $obj->nombre_mesa=request('nombre_mesa');
        $obj->descripcion_mesa=request('descripcion_mesa');
        $obj->save();
        return redirect()->route('mesas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mesas $mesas)
    {
        //
    }
}
