@extends('layouts.layout')

@section('content')
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Carrito</span></p>

        <div class="card mb-4">
        <?php 
            $total = 0;
                $numeros =  $_COOKIE["carrito"];
                $elementos = explode(",", $numeros);
                sort($elementos);
                $elementos2 = array_unique($elementos);
                foreach($elementos2 as $elemento2){
                    $cantidad =0;
                    foreach($elementos as $elemento){
                        if( $elemento == $elemento2){
                            $cantidad++;
                        }
                    }
                    foreach($productos as $producto){
                        if ($elemento2 == $producto->id)
                            $elProducto = $producto;  
                    }
                    $preciototal = $elProducto->precio * $cantidad;
                    $total += $preciototal;
        ?>
          <div class="card-body p-4">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-2 d-flex justify-content-center" style="max-width: 50%;">
                <img src="{{ asset($elProducto->foto) }}" class="img-fluid">
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Producto</p>
                  <p class="lead fw-normal mb-0">{{$elProducto->nombre}}</p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Precio</p>
                  <p class="lead fw-normal mb-0">{{$elProducto->precio}}€</p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Cantidad</p>
                  <p class="lead fw-normal mb-0">{{$cantidad}}</p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                <p class="small text-muted mb-4 pb-2">Suma</p>
                  <p class="lead fw-normal mb-0">{{$preciototal}}€</p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                    <a onclick="borrar();" id="{{$elProducto->id}}" class="btn btn-danger mt-auto idProducto">Borrar</a>
                </div>
              </div>
              <script type="text/javascript">

                function borrar(){
                  let productosBorrar = document.getElementsByClassName('idProducto');
                  
                  for(i=0; i<productosBorrar.length; i++) {
                    productosBorrar[i].addEventListener('click', function(e) {
                      let borrar = this.id;
                      var carrito2;
                      var lista2;
                      var lasCookies = document.cookie;
                      arrayCookies = lasCookies.split(" ");
                      for (i=0; i<arrayCookies.length ; i++){
                              if (arrayCookies[i].charAt(0)=="c")
                                carrito = arrayCookies[i];
                                carrito2= carrito.slice(8,-1);
                      }
                      var lista = carrito2.split(",");
                          var pos = lista.indexOf(borrar);
                          
                          if(pos==0){
                            lista.shift();
                            lista2 = lista;
                          }
                          else{
                            lista2 = lista.splice(pos,1);
                          }
                          document.cookie = "carrito="+lista+"; path=/";
                    });
                  }

                  $.ajax({
                      data:  parametros,
                      url:   'carrito.blade.php',
                      type:  'post',
                      beforeSend: function () {
                              $("#resultado").html("Procesando, espere por favor...");
                      },
                      success:  function (response) {
                              $("#resultado").html(response);
                      }
                    });
                }
              </script>
            </div>
            
          </div><hr>
        <?php
            }
        ?>
        </div>

        <div class="card mb-5">
          <div class="card-body p-4">

            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2">Total:</span> <span class="lead fw-normal">{{$total}}€</span>
              </p>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-end">
          <a  class="btn btn-light btn-lg me-2" href="{{ route('home') }}">Volver a la tienda</a>
          
          <?php
            if(!Auth::user()){
            ?>
                    <a class="btn btn-primary" href="{{ route('login')}}">Login necesario para comprar</a>
            <?php
                }
                else{
            ?>
                    <form action="{{ route('storeCarrito')}}" method="post" enctype="multipart/form-data">
                        @csrf      
                        <input type="hidden" name="id_cliente"  id="id_cliente" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="suma_precio" id="suma_precio" value="{{$total}}" />
                        <button type="submit" class="btn btn-primary">Comprar</button>
                    </form>
            <?php
                }
            ?>
        </div>
      </div>
    </div>
  </div>

  @endsection
