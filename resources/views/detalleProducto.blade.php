<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Detalle Producto</title>
</head>
<body>
    <div class="container">
        <div class="row">
                    <div class="col-lg-5">
                        <div class="white-box"><img src="{{ $producto->foto }}" class="img-responsive"></div>
                    </div>
                    <div class="col-lg-7">
                        <h3 class="card-title">{{ $producto -> nombre }}</h3>
                            <h4 class="box-title mt-5">Descripción</h4>
                            <p>{{ $producto->descripcion }}</p>
                            <h2 class="mt-5">{{ $producto->precio }} €</h2>
                            <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            <button class="btn btn-primary btn-rounded">Comprar</button>
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('productos') }}">Volver</a>
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('createProduct') }}">Crear</a>
                    </div>
        </div>
    </div>
</body>
</html>