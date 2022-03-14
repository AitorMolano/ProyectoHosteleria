@extends('layouts.layout')
@section('content')
<table class="table table-striped text-center">

<thead>
    <tr>
      <th scope="col">Productos</th>
      <th scope="col">Precio total</th>
      <th scope="col">Ver estado</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($carrito_total as $carrito)
        <tr>
            <td class="text-capitalize">
            @foreach($carrito['productos'] as $producto)
                {{$producto }}<br/>
            @endforeach
                </td>
            <td>{{$carrito['suma']}} &euro;</td>
            <td class="text-capitalize">
              <button type="button" class="btn btn-purple"><a href="{{ route('estado.show', $carrito['id_pedido']) }}" class="text-decoration-none text-white">Ver estado</a></button> 
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
@endsection