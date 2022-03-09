@extends('layouts.layout')
@section('content')
<table class="table table-striped">

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
            <td class="text-capitalize">{{$carrito['estado']}}</td>
        </tr>
      @endforeach
  </tbody>
</table>
@endsection