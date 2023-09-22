@extends('base')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <div class="row" style="text-align: center">
                @foreach ($mesas as $m)
                    <div class="col-sm-3">
                        <a href="/pedidos/create/{{$m->id}}" style="width: 280px;height:150px;font-size:30px; background-color:rgb(103, 208, 46)"
                        class="btn btn-success">
                        {{$m->nombre_mesa}}
                        {{$m->descripcion_mesa}}
                    </a>
                    <br>
                    </div>
                @endforeach

                
            </div>
        </div>
    </div>
@endsection