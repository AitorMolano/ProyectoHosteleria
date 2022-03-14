@extends('layouts.layout')
@section('content')

    <?php
    $cantidad= count($pedidos);
    $cantidad0= count($enviados);
    $cantidad1= count($en_cursos);
    $cantidad2= count($en_caminos);
    $cantidad3= count($pedidos);
    $cantidad4= count($c_recibidos);
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $contar =1;
    ?>
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    
        <h3>Pedidos actuales</h3>
        <div class="row">
        <table class="table table-striped table-hover table-responsive">
        <tr>
                <th>Enviados</th>
                <th>En curso</th>
                <th>Preparados</th>
                <th>Recibidos</th>
            </tr>
            <tr>
                <th>{{$cantidad0}}</th>
                <th>{{$cantidad1}}</th>
                <th>{{$cantidad2}}</th>
                <th>{{$cantidad3}}</th>
            </tr>
        </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="{{ asset('/js/grafico.js') }}"></script>
@endsection