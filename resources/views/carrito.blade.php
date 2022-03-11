@extends('layouts.layout')

@section('content')
<div class="container">
   
    <h2>Carrito</h2>
    <table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Cantidad</th>
        <th>Precio</th>
        
    </tr>
 <?php 
 $total = 0;
    $numeros =  $_COOKIE["carrito"];
    $elementos = explode(",", $numeros);
    sort($elementos);
    $elementos2 = array_unique($elementos);
    foreach($elementos2 as $elemento2){
        $cantidad =0;
        foreach($elementos as $elemento){
            if( $elemento == $elemento2){
                $cantidad++;
            }
        }
        foreach($productos as $producto){
            if ($elemento2 == $producto->id)
                $elProducto = $producto;  
        }
?>

    <tr>
        <td>{{$elemento2}}</td>
        <td>{{$elProducto->nombre}}</td>
        <td><img src="{{ asset($elProducto->foto) }}" class="img-fluid"></td>
        <td>{{$cantidad}}</td>
        <?php
        $preciototal = $elProducto->precio * $cantidad;
        $total += $preciototal;
        ?>
        <td>{{$preciototal}}</td>
    </tr>

        

<?php
    }
?>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$total}}</td>
    </tr>
</table>
<?php
    if(!Auth::user()){
?>
        <button type="submit" disabled class="btn btn-primary ">Comprar</button>
<?php
    }
    else{
?>
        <form action="{{ route('storeCarrito')}}" method="post" enctype="multipart/form-data">
            @csrf       
            <input type="hidden" name="id_cliente"  id="id_cliente" value="{{ Auth::user()->id }}" />
            <input type="hidden" name="suma_precio" id="suma_precio" value="{{$total}}" />
            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
<?php
    }
?>


</div>
@endsection
