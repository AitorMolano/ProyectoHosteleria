@extends('layouts.layout')

@section('content')
<div class="container col-12 d-flex flex-column justify-content-center align-items-center">

  <div class="row mt-0">
  <h2>Crear producto</h2>
  </div>

  <form action="{{ route('storeProduct')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="form-group col-md-4">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
      </div>
      <div class="form-group col-md-4">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" id="precio" name="precio" placeholder="">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-4">
        <label for="descripcion">Descripcion</label>
        <textarea id="descripcion" cols="50" rows="10" name="descripcion"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="cantidadMinima">Cantidad Minima</label>
        <input type="text" class="form-control" id="cantidadMinima" name="cantidadMinima" placeholder="">
      </div>
      <div class="form-group col-md-4">
        <label for="foto">Imagen</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-4">
        <button type="submit" class="btn btn-primary ">Crear producto</button>
        <a class="btn btn-outline-dark mt-auto" href="{{ route('home') }}">Volver</a>
      </div>
    </div>
  </form>
  
</div>
@endsection
