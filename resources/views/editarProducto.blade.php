@extends('layouts.layout')

@section('content')
<div class="container col-12 d-flex flex-column justify-content-center align-items-center">

  <div class="row mt-0">
  <h2>Editar producto</h2>
  </div>

  <form action="{{ route('actualizar', $producto->id) }}" method="post" enctype="multipart/form-data">
  @method('put')
  @csrf
    <div class="row">
      <div class="form-group col-md-4">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$producto->nombre}}">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" id="precio" name="precio" value="{{$producto->precio}}">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-4">
        <label for="descripcion">Descripcion</label>
        <textarea id="descripcion" cols="50" rows="10" name="descripcion">{{$producto->descripcion}}</textarea>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-4">
        <label for="disponible">Disponible</label>
            <?php
                $disponible = $producto->disponible;
            ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioDis" value="1" id="radioD">
                <label class="form-check-label" for="radioD">Disponible</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radioDis" value="0" id="radioNoD">
                <label class="form-check-label" for="radioNoD" >No disponible</label>
            </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-4">
        <label for="cantidadMinima">Cantidad Minima</label>
        <input type="text" class="form-control" id="cantidadMinima" name="cantidadMinima" value="{{$producto->cantidadMinima}}">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="foto">Imagen</label>
        <input type="file" class="form-control" id="foto" name="foto" value="">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-4">
        <button type="submit" class="btn btn-primary ">Confirmar cambios</button>
        <a class="btn btn-outline-dark mt-auto" href="{{ route('home') }}">Cancelar</a>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
        var jsvar = '<?=$disponible?>';
        if (jsvar == 0) {
            document.getElementById("radioNoD").setAttribute('checked', '');
        }else{
            document.getElementById("radioD").setAttribute('checked', '');
        }
    </script>
@endsection
