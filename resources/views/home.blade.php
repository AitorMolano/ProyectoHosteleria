<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>HOME</title>
</head>
<body class="bg-ligth">
    <div class="container-fluid">
        <div class="row">
            @foreach ($productos as $producto) 
               <div class="col-xl-3 col-md-4 col-6 mt-2">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src= {{ $producto->foto }} alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$producto->nombre}}</h5>
                                <!-- Product price-->
                                {{$producto->precio}} &euro;
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver M&aacute;s</a></div>
                        </div>
                    </div>
               </div>
            @endforeach
        </div>
    </div>
</body>
</html>