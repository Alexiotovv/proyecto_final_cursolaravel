@extends('base')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <p>Mesas</p>
                </div>
                <div class="col-sm-6" style="text-align: end">
                    <a href="{{route('mesas.create')}}" class="btn btn-primary"><i class="lni lni-circle-plus"></i>Nueva Mesa</a>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Acción</th>
                        <th>NombreMesa</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mesas as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td><a href="/mesas/edit/{{$m->id}}" class="btn btn-warning btn-sm">Editar</a></td>
                            <td>{{$m->nombre_mesa}}</td>
                            <td>{{$m->descripcion_mesa}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection