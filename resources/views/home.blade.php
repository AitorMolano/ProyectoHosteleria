@extends('layouts.layout')
@section('content')
<div class="container px-4 px-lg-5 mt-5 user-select-none">
    <form action="#" method="get" class="">
        <select name="categoria" id="categorias" class="bg-purple text-white rounded-pill p-2 ">
            <option value="Categoria">Categorias</option>
            <option value="Fritos">Fritos</option>
            <option value="Entrantes">Entrantes</option>
            <option value="Pescado">Pescado</option>
            <option value="Carne">Carne</option>
            <option value="Semifrios">Semifrios</option>
            <option value="Tarta de bizcocho">Tarta de bizcocho</option>
            <option value="Tarta de hojaldre">Tarta de hojaldre</option>
            <option value="Tartas variadas">Tartas variadas</option>
            <option value="Variedades">Variedades</option>
        </select>

        <input type="text" name="nombre" class="mx-2 rounded-pill bg-purple text-white px-2 " autocomplete="off" aria-selected="false" id="nombre"/>
    </form>

    @guest
        <div class="productos row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"></div>  
    @else
        @if (Auth::user()->rol == 0 )
            <div class="productos row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"></div>  
        @else
            <h2>Admin</h2>
        @endif
    @endguest

    <div class="row mt-2 boton">
        <button type="button" class=" col-12 btn btn-outline-purple" onclick="mostrarMas()">+</button>
    </div>
</div>
<script src="{{ asset('/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('/js/productos.js') }}"></script>
@endsection