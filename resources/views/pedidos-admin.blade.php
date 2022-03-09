@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12">
    <table class="table table-striped text-center">
    <thead>
        <tr>
        <th scope="col">id-pedido</th>
        <th scope="col">Productos</th>
        <th scope="col">Precio total</th>
        <th scope="col">Ver estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carrito_total as $carrito)
        
            <tr>
                <th>{{$carrito['id_pedido']}}</th>
                <td class="text-capitalize">
                @foreach($carrito['productos'] as $producto)
                    {{$producto }}<br/>
                @endforeach
                    </td>
                <td>{{$carrito['suma']}} &euro;</td>
                <td class="text-capitalize">
                    
                    @switch({{$carrito['estado']}})
                        @case('recibido')
                            <form action="#" method="get" class="">
                                <select name="estado" id="estado" class="bg-purple text-white rounded-pill p-2 ">
                                    <option value="recibido">Recibido</option>
                                    <option value="en proceso">En Proceso</option>
                                    <option value="preparado">Preparado</option>
                                </select>
                            </form>
                            @break;
                        @case('en proceso')
                            <form action="#" method="get" class="">
                                <select name="estado" id="estado" class="bg-purple text-white rounded-pill p-2 ">
                                    <option value="en proceso">En Proceso</option>
                                    <option value="preparado">Preparado</option>
                                    <option value="recibido">Recibido</option>
                                </select>
                            </form>
                            @break;
                        @case('preparado')
                            <form action="#" method="get" class="">
                                <select name="estado" id="estado" class="bg-purple text-white rounded-pill p-2 ">
                                    <option value="preparado">Preparado</option>
                                    <option value="en proceso">En Proceso</option>
                                    <option value="recibido">Recibido</option>
                                </select>
                            </form>
                            @break;
                    @endswitch
                    <select name="categoria" id="categorias" class="bg-purple text-white rounded-pill p-2 ">
                        <option value="estado-actual">Categorias</option>
                        <option value="Fritos">Fritos</option>
                        <option value="Entrantes">Entrantes</option>
                    </select>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
    </div>
</div>
@endsection