<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\platos;
use App\Models\mesas;
use Illuminate\Http\Request;
use DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $platos=platos::all();
        $mesa=mesas::find($id);
        return view('pedidos.index',['platos'=>$platos,'mesa'=>$mesa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $obj = new pedidos();
        $obj->id_mesas=request('idMesa');
        $obj->id_platos=request('idPlato');
        $obj->comentario=request('comentario');
        $obj->cantidad=request('cantidad');
        $obj->estado='ORDENADO';
        $obj->save();
        // $obj->id_usuarios=;
    }

    /**
     * Display the specified resource.
     */
    public function show(pedidos $pedidos)
    {
        $obj= DB::table('pedidos')
        ->lefjoin('platos','platos.id','=','pedidos.id_platos')
        ->where('estado','=','ORDENADO')
        ->select('platos.nombre_plato','')
        ->get();
        return response()->json($obj);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pedidos $pedidos)
    {
        //
    }
}
