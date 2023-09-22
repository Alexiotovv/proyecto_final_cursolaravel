@extends('base')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <p>Platos</p>
                </div>
                <div class="col-sm-6" style="text-align: end">
                    <a href="{{route('platos.create')}}" class="btn btn-primary"><i class="lni lni-circle-plus"></i>Nuevo plato</a>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Acción</th>
                        <th>Imagen</th>
                        <th>Nombreplato</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platos as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td><a href="/platos/edit/{{$m->id}}" class="btn btn-warning btn-sm">Editar</a></td>
                            <td><img src="{{asset('storage/platos/'.$m->imagen)}}" style="height: 80px;width:80px" alt=""></td>
                            <td>{{$m->nombre_plato}}</td>
                            <td>{{$m->descripcion_plato}}</td>
                            <td>{{$m->precio}}</td>
                            <td>{{$m->estado}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection