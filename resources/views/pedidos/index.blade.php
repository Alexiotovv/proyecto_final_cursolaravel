@extends('base')
@section('contenido')
<div class="row">
    <div class="col-sm-12">
        <input type="text" id="idmesa" value="{{$mesa->id}}" hidden>
        <h4>Usted está atendiendo en la {{$mesa->nombre_mesa}}</h4>
         <input type="text" value="{{$mesa->id}}" name="idmesa" id="idmesa" hidden>
        <h5>Pedidos</h5>
    </div>
    
    
    {{-- CARD LA LISTA DE PLATOS O BEBIDAS --}}
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                {{-- <input type="text" class="form-control" placeholder="buscar un plato o bebida..."> --}}
                <br>
                <div class="row">
                    <table>
                        <thead>
                            {{-- <th>id</th>
                            <th>plato</th> --}}
                        </thead>
                        <tbody>
                            @foreach ($platos as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>
                                        <div class="col-sm-4">
                                            <div class="card" style="text-align: center">
                                                <div class="card-body">
                                                    <img src="{{asset('storage/platos/'.$p->imagen)}}" style="width: 160px;height:160px;" alt="">
                                                </div>
                                                <div class="card-footer">
                                                    <form action="" id="frmPedido{{$p->id}}" >@csrf
                                                        <input type="text" class="inputMesa" name="idMesa" value="" hidden>
                                                        <input type="text" name="idPlato" id="idPlato" value="{{$p->id}}" hidden>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p>cantidad</p>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="cantidad" name="cantidad" class="form-control form-control-sm" value="1">
                                                            </div>
                                                        </div>
                                                        <label for="">Notas adicionales</label>
                                                        <textarea type="text" name="comentario" id="comentario" class="form-control form-control-sm">-</textarea>
                                                        <a type="submit" class="btn btn-warning btn-sm pasar_plato">{{$p->nombre_plato}}<strong>{{$p->precio}}</strong></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    {{-- END CARD LA LISTA DE PLATOS O BEBIDAS --}}    

    {{-- CARD DE LA LISTA DE ITEMS DE LOS PEDIDOS --}}
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table table-hover" id="lista_pedidos">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    <hr>
                    <table>
                        <tbody>
                            <tr>
                                <td>Total a Pagar</td>
                                <td><h5>S/ 180.00</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <a href="" class="btn btn-success">Finalizar Venta</a>
                </div>
            </div>
        </div>
    </div>

    {{-- END CARD DE LA LISTA DE ITEMS DE LOS PEDIDOS --}}
</div>
@endsection

@section('extra_js')
<script>

    
    pasar_plato();

    $(document).on("click",".pasar_plato",function (e) { 
        e.preventDefault();
        fila = $(this).closest("tr");
        id = (fila).find('td:eq(0)').text();
        $(".inputMesa").val($("#idmesa").val());
        
        ds=$("#frmPedido" + id).serialize();
        $("#lista_pedidos tbody").html("");
        $.ajax({
            type: "POST",
            url: "/pedidos/store",
            data: ds,
            dataType: "json",
            success: function (response) {
                pasar_plato();
            }
        });

        pasar_plato();
        
     })

     function pasar_plato() { 
        idmesa=$("#idmesa").val();
        $.ajax({
            type: "GET",
            url: "/pedidos/show/"+idmesa,
            dataType: "json",
            success: function (response) {
                console.log(response);
                response.forEach(element => {
                    console.log(element.nombre_plato)
                    $("#lista_pedidos").append('<tr>'+
                        '<td>'+
                            '<p>'+element.nombre_plato+'</p>'+
                            '<div class="group-inline">'+
                            '<a href="" class="btn btn-info btn-sm" style="width: 60px"><li class="lni lni-plus"></li></a>'+
                            '<a href="" class="btn btn-warning btn-sm" style="width: 60px"><li class="lni lni-minus"></li></a>'+
                            '<a href="" class="btn btn-danger btn-sm" style="width: 60px"><li class="lni lni-trash"></li></a>' +
                            '</div>'+ '</td>'+
                        '<td>'+
                            'x1'+
                        '</td>'+
                        '<td>'+
                            'S/ 85.00'+
                        '</td>'+
                    '</tr>')       
                });
            }
        });
      }
       



</script>

@endsection

