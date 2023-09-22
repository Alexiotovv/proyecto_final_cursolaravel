@extends('base')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <form action="{{route('platos.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5>Editar Plato</h5>
                <input type="text" value="{{$plato->id}}" name="id" hidden>
                <label for="">NombrePlato</label>
                <input type="text" class="form-control" value="{{$plato->nombre_plato}}" name="nombre_plato">
                <label for="">Descripción</label>
                <input type="text" class="form-control" value="{{$plato->descripcion_plato}}" name="descripcion_plato">
                <label for="">Precio</label>
                <input type="number" value="{{$plato->precio}}" class="form-control" name=precio>
                
                <div class="row">
                    <label for="">ImagenActual</label>
                    <img src="{{asset('storage/platos/'.$plato->imagen)}}" style="height: 80px;width:80px;" alt="">
                </div>

                <div class="row">
                    <label for="">Cambiar Imagen</label>
                    <input type="file" class="form-control" name="imagen">
                </div>
                
                <label for="">Estado</label>
                <select name="estado" id="estado" class="form-select">
                    @if ($plato->estado=='1')
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>    
                    @else
                        <option value="1">Activo</option>
                        <option value="0" selected>Inactivo</option>    
                    @endif
                </select>

                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection