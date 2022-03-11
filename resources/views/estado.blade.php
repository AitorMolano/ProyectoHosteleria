@extends('layouts.layout')
@section('content')
<div class="container p-0 h-75" style="width: 100%;">
    <div class="icono-barra px-5">

        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <ion-icon name="business-outline" style="font-size: 40px;"></ion-icon>
                <ion-icon name="home-outline" style="font-size: 40px;"></ion-icon>
            </div>
        </div>
        
        <div class="row d-flex justify-content-center align-items-center">
            <div class="progress col-12 p-0">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$estado_porcentaje}}%"></div>
            </div>
        </div>

    </div>

    <div class="row px-5">
        <div class="col-12 p-0 mt-2">
            <p>Estado actual:</p>
        </div>
    </div>

    <div class="row px-5">
        <div class="col-12">
            <form action="{{ route('pedidos.update') }}" method="post" class="formulario">
                @csrf
                <input type="hidden" name="id_pedido" id='pedido-id' value='{{$id}}'/>
                <select name="estado" id='estado-nuevo' class=" form-control bg-purple text-white rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Para modificar el estado cambia el valor del estado actual y haga click en aceptar" class="bg-purple text-white rounded-pill p-2 ">
                    @switch($estado)
                        @case('recibido')
                                <option value="recibido">Recibido</option>
                                <option value="en proceso">En Proceso</option>
                                <option value="preparado">Preparado</option>
                            @break;
                        @case('en proceso')
                                <option value="en proceso">En Proceso</option>
                                <option value="preparado">Preparado</option>
                                <option value="recibido">Recibido</option>
                            @break;
                        @case('preparado')
                                <option value="preparado">Preparado</option>
                                <option value="en proceso">En Proceso</option>
                                <option value="recibido">Recibido</option>
                            @break;
                    @endswitch
                </select>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-graydark">Aceptar Cambios</button>   
                        <a href="{{route('estado.show',$id)}}"></a>    
                        <button type="button" class="btn btn-graydark">Volver Atras</button>       
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection