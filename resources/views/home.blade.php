@extends('layouts.layout')
@section('content')
<div class="container px-4 px-lg-5 mt-5">
    <div class="productos row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
       
    </div>
    <div class="row mt-2">
        <button type="button" class=" col-12 btn btn-outline-purple" onclick="mostrarMas()">+</button>
    </div>
</div>
<script src="{{ asset('/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('/js/productos.js') }}"></script>
@endsection
