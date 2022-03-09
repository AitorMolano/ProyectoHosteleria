@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="m-0 row d-flex justify-content-center align-items-center">
                    <div class="col-lg-4">
                        <img src="{{ asset($producto->foto) }}" class="img-fluid">
                    </div>
                    <div class="col-lg-4">
                        <h3 class="box-title">{{ $producto -> nombre }}</h3>
                            <h4 class="box-title mt-2">Descripción</h4>
                            <p>{{ $producto->descripcion }}</p>
                            <button class="btn btn-success btn-rounded">Disponible</button>
                            <button class="btn btn-danger btn-rounded">No disponible</button>
                            <h2 class="mt-5">{{ $producto->precio }} €</h2>
                            <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" id="anadirCarrito" title="" data-original-title="Add to cart">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        
                            <input type="hidden" id="producto-id" value="{{ $producto -> id }}" />

<a href="#" id="agregar-favoritos">Agregar a favoritos</a>

<script>
    var carrito="";
    var lasCookies = document.cookie;
    arrayCookies = lasCookies.split(" ");
        for (i=0; i<arrayCookies.length ; i++){
            if (arrayCookies[i].charAt(0)=="c")
               carrito = arrayCookies[i];
               carrito2= carrito.slice(8,-1);
        }
    document.getElementById("anadirCarrito").addEventListener("click", function(e) {
        id = document.getElementById("producto-id").value;
        carrito2 +=","+ id;
        document.cookie = "carrito="+carrito2 +"; path=/";
});
</script>
        <a class="btn btn-outline-dark mt-auto" href="{{ route('home') }}">Volver</a>
                    </div>
        </div>
    </div>
    <script>

    </script>
@endsection