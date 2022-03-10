@extends('layouts.layout')
@section('content')
<body>
    <h2>Estado</h2>
    <div class="row">
        <div class="col-12 d-flex justify-content-between mb-0 pb-0 align-items-start">
            <ion-icon name="business-outline" style="font-size: 40px;"></ion-icon>
            <ion-icon name="home-outline" style="font-size: 40px;"></ion-icon>
        </div>
    </div>

    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$estado_porcentaje}}%"></div>
    </div>
    <form action="#" method="post">
        <select name="estado" id='estado-nuevo' class=" form-control bg-purple text-white rounded-pill" class="bg-purple text-white rounded-pill p-2 ">
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
    </form>
    </form>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('/js/pedidos.js') }}"></script>
@endsection