<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hosteleria</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class='bg-ligth' style="height: 100vh;">
    <div class="container-fluid" style="height:100%"> 
        <header class='row'style="height:20%">
            <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class='img-fluid'style="heigth: 30%">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </div>
        </header>

        <main class='row' style="height:70%">
            @yield('content')
        </main>

        <footer class="bg-dark text-white row d-flex  justify-content-between"style="height:10%" >     
            <p class='col-5 m-3 p-3'>FUNDACIÓN DIOCESANAS - JESÚS OBRERO FUNDAZIOA  © EGIBIDE</p>   
            <p class='col-5 m-3 p-3'>Diseñado por Aitor,Rafa,Alaitz :S | Desarrollado por Aitor,Rafa,Alaitz :D </p>       
        </footer>
    </div>
</body>
</html>