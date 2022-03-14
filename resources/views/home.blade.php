@extends('layouts.layout')
@section('content')
<div class="container m-0 p-0 px-lg-5 mt-5 user-select-none">
    <div class="row">
        <div class="col-12">
            @php
                //dd(session('compra_realizada')); 
            @endphp
            <input type="hidden" name="compra-realizada" value="{{(isset($compra_realizada) || session('compra_realizada')) ? 'true' : ''}}" id='compra'/>
            <input type="hidden" name="producto_guardado" value="{{(isset($producto_guardado) || session('producto_guardado')) ? 'true' : ''}}" id='producto_guardado'/>
            <input type="hidden" name="estado" value="{{(isset($estado) || session('estado')) ? 'true' : ''}}" id='estado'/>
            <input type="hidden" name="estado" value="{{(isset($producto_actualizado) || session('producto_actualizado')) ? 'true' : ''}}" id='producto_actualizado'/>
            <input type="hidden" name="estado" value="{{(isset($perfil) || session('perfil')) ? 'true' : ''}}" id='perfil'/>
            <input type="hidden" name="estado" value="{{(isset($eliminar) || session('eliminar')) ? 'true' : ''}}" id='eliminar'/>
            <form action="#" method="get" class="">
                <div class="row">
                    <div class="col-12 col-sm-2 mx-2 mx-sm-5">
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
                    </div>
                    
                    <div class="col-12 col-sm-1">
                        <input type="text" name="nombre" class="mx-2 mt-2 rounded-pill bg-purple text-white px-2 " autocomplete="off" aria-selected="false" id="nombre"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            @guest
                <div class="productos row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"></div>  
            @else
                @if (Auth::user()->rol == 0 )
                    <div class="productos row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"></div>  
                @else
                    <div class="productos row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"></div>  
                @endif
            @endguest
        </div>
    </div>

    <div class="row mt-2 boton">
        <button type="button" class=" col-12 btn btn-outline-purple" onclick="mostrarMas()">+</button>
    </div>
</div>
<script src="{{ asset('/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('/js/productos.js') }}"></script>
@endsection