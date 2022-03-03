<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Detalle Producto</title>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $producto -> name; }}</h3>
            <h6 class="card-subtitle">Noseque</h6>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img src="https://via.placeholder.com/430x600/00CED1/000000" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Descripción</h4>
                    <p>{{ $producto->descripcion }}</p>
                    <h2 class="mt-5">{{ $producto->precio }} €</h2>
                    <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <button class="btn btn-primary btn-rounded">Comprar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>