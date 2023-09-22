@extends('base')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <form action="{{route('mesas.store')}}" method="POST">
                @csrf
                <h5>Registrar Mesa</h5>
                <label for="">NombreMesa</label>
                <input type="text" class="form-control" name="nombre_mesa">
                <label for="">Descripción</label>
                <input type="text" class="form-control" name="descripcion_mesa">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection