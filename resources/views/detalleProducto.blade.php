@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="m-0 row d-flex justify-content-center align-items-center">
                    <div class="col-lg-4" style="max-width: 50%;">
                        <img src="{{ asset($producto->foto) }}" class="img-fluid">
                    </div>
                    <div class="col-lg-4">
                        <h3 class="box-title">{{ $producto -> nombre }}</h3>
                            <h4 class="box-title mt-2">Descripción</h4>
                            <p>{{ $producto->descripcion }}</p>
                            <?php $disponible = $producto->disponible?>
                            <button class="btn btn-success btn-rounded" id="btnDisponible" style="display:none;">Disponible</button>
                            <button class="btn btn-danger btn-rounded" id="btnNoDisponible" style="display:none;">No disponible</button>
                            
                            <h2 class="mt-5">{{ $producto->precio }} €</h2>
                            <button class="btn btn-dark btn-rounded mr-1 carrito" id="{{$producto->id}}" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <input type="hidden" id="producto-id" value="{{ $producto -> id }}" />
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('home') }}">Volver</a>
                            @if (!Auth::user()==null)
                                @if ((Auth::user()->rol)==1)
                                <a class="btn btn-outline-dark mt-auto" href="{{ route('editProducto', $producto->id) }}">Editar</a>
                                <form method="POST" action="{{ route('borrarProducto', $producto->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Borrar" class="btn btn-danger btn-outline-dark mt-2">
                                </form>  
                                @endif
                            @endif
                        </div>
        </div>
    </div>
    <script type="text/javascript">
        var jsvar = '<?=$disponible?>';
        if (jsvar == 0) {
            document.getElementById("btnNoDisponible").style.display = "block";
            document.getElementById("anadir").style.display = "none";
        }else{
            document.getElementById("btnDisponible").style.display = "block";
        }

        var lasCookies = document.cookie;
        arrayCookies = lasCookies.split(" ");
            for (i=0; i<arrayCookies.length ; i++){
                if (arrayCookies[i].charAt(0)=="c")
                carrito = arrayCookies[i];
                carrito2= carrito.slice(8,-1);
            }

        let carritos = document.getElementsByClassName('carrito');
        for(i=0; i<carritos.length; i++) {
            carritos[i].addEventListener('click', function(e) {
                if(carrito2 =="")
                    carrito2 += this.id;
                else
                    carrito2 +=","+ this.id;

                document.cookie = "carrito="+carrito2 +"; path=/";
                mostrarAlert()
            });
        }


        function mostrarAlert(){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            
            Toast.fire({
                icon: 'success',
                title: 'Producto añadido al carrito correctamente'
            })
        }
    </script>

@endsection
