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
                            <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('home') }}">Volver</a>
                    </div>
        </div>
    </div>
    <script>

    </script>
@endsection