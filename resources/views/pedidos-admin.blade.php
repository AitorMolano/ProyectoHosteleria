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
                            <button type="button" class="btn btn-purple"><a href="{{ route('estado.show', $carrito_total[0]['id_pedido']) }}" class="text-decoration-none text-white">Ver estado</a></button> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('/js/pedidos.js') }}"></script>
@endsection