@extends('base')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <form action="{{route('mesas.update')}}" method="POST">
                @csrf
                <h5>Editar Mesa</h5>
                <input type="text" value="{{$mesa->id}}" name="id" hidden>
                <label for="">NombreMesa</label>
                <input type="text" class="form-control" value="{{$mesa->nombre_mesa}}" name="nombre_mesa">
                <label for="">Descripción</label>
                <input type="text" class="form-control" value="{{$mesa->descripcion_mesa}}" name="descripcion_mesa">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection