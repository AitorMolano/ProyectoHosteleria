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
                            <button class="btn btn-dark btn-rounded mr-1" id="anadirCarrito" data-toggle="tooltip" title="" data-original-title="Add to cart">
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
    </script>

@endsection
