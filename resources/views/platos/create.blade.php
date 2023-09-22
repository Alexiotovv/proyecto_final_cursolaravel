@extends('base')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <form action="{{route('platos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5>Registrar Plato o Bebidas</h5>
                <label for="">Nombre Plato o Bebida</label>
                <input type="text" class="form-control" name="nombre_plato">
                <label for="">Descripción</label>
                <input type="text" class="form-control" name="descripcion_plato">
                <label for="">Precio</label>
                <input type="number" value="0.00" class="form-control" name=precio>
                <label for="">Imagen</label>
                <input type="file" class="form-control" name="imagen">
                <label for="">Estado</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>

                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection