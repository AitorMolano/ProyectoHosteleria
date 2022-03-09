<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hosteleria</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class='bg-ligth' style="height: 100vh;">
    <div  class="container-fluid" style="height:100%"> 
        <header class='row'>
            
        <nav class="navbar navbar-expand-md navbar-dark bg-purple shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Escuela Hosteleria
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if ((Auth::user()->rol)==1)
                                <a class="dropdown-item" href="{{ route('createProduct') }}">Crear</a>
                                <a class="dropdown-item" href="#">Ver todos los pedidos</a>
                                @else
                                <a class="dropdown-item" href="{{ route('pedidos') }}">Mis pedidos</a>
                                @endif    
                                <a id="logout" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li>
                                <a class="btn btn-light btn-rounded mr-1" data-toggle="tooltip" href="{{ route('showCarrito') }}" data-original-title="Add to cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

            <script>
                document.getElementById("logout").addEventListener("click", function(e) {
                var carrito ="[]";
                carrito = JSON.parse(carrito);
                sessionStorage.setItem("carrito", JSON.stringify(carrito));
                document.cookie = "carrito =; max -age =0";
                alert("Carrito vaciado");
                });
            </script>
        </header>

        <main class='row'>
            <div class='col-12 d-flex justify-content-center align-items-center'>
                <img src="{{ asset('img/logo.png') }}" class="img-fluid h-50"/>
            </div>
        
            @yield('content')
        </main>
        <footer class="bg-dark text-white row d-flex mt-3 justify-content-between">     
            <p class='col-6 my-3 p-3'>FUNDACIÓN DIOCESANAS - JESÚS OBRERO FUNDAZIOA  © EGIBIDE</p>   
            <p class='col-6 my-3 p-3'>Diseñado por Aitor,Rafa,Alaitz :S | Desarrollado por Aitor,Rafa,Alaitz :D </p>       
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>