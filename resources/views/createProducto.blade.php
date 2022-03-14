@extends('layouts.layout')
@section('content')
<div class="container w-100 m-0 p-0 col-12 d-flex flex-column justify-content-center align-items-center">

  <div class="row mt-0">
    <div class="col-12">
      <h2>Crear producto</h2>
    </div>
  </div>
  
  <div class="row mx-auto">
    <div class="col-12">
    <input type="hidden" name="estado" value="{{(isset($producto) || session('producto')) ? 'true' : ''}}" id='producto'/>
      <form action="{{ route('storeProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-6 mt-2">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
          </div>
          
          <div class="form-group col-md-6 mt-2">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" placeholder="">
          </div>
        </div>

        <div class="row mt-2">
          <div class="form-group col-12 d-flex flex-column">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" cols="50" rows="10" name="descripcion"></textarea>
          </div>
        </div>

        <div class="row mt-2">
          <div class="form-group col-md-6">
            <label for="cantidadMinima">Cantidad Minima</label>
            <input type="text" class="form-control" id="cantidadMinima" name="cantidadMinima" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="foto">Imagen</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="">
          </div>
        </div>

        <div class="row mx-2">
          <select name="categoria" id="categorias" class="bg-purple text-white rounded-pill p-2 mt-2">
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

        <div class="row mt-3 d-flex ">
          <div class="col-sm-3 mt-1">
            <button type="submit" onclick='btn_crear()' class="btn btn-primary ">Crear producto</button>
          </div>
          <div class="col-sm-3 mt-1">
            <a class="btn btn-outline-dark mt-auto" href="{{ route('home') }}">Volver</a>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
