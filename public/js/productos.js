var todos_productos = [];
var pagina = 1;
var carrito="";
 
$(document).ready(function(){
    obtenerDatos();
    var lasCookies = document.cookie;
    arrayCookies = lasCookies.split(" ");
        for (i=0; i<arrayCookies.length ; i++){
            if (arrayCookies[i].charAt(0)=="c")
               carrito = arrayCookies[i];
               carrito2= carrito.slice(8,-1);
        }
});

function obtenerDatos(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })

    $.ajax({
        type:'GET',
        url:'/api/productos',
        success: function(json){
            todos_productos = json['productos'];
            primeros12();
        }
    })
}

function primeros12(){
    let div_productos = document.getElementsByClassName('productos')[0];
    for(let x =0;x<12;x++){
        div_productos.innerHTML = div_productos.innerHTML + `
            <div class="col-xl-3 col-md-4 col-6 mt-2">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src= "`+todos_productos[x]['foto']+`" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">`+todos_productos[x]['nombre']+`</h5>
                            <!-- Product price-->
                            `+todos_productos[x]['precio']+` &euro;
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="producto/`+todos_productos[x]['id']+`">Ver M&aacute;s</a></div>
                    </div>
                    <p class="btn btn-light btn-rounded mr-1 carrito" data-toggle="tooltip" id="`+todos_productos[x]['id']+`" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </p>
                </div>
            </div>
        `;
    }
    let carritos = document.getElementsByClassName('carrito');
        for(i=0; i<carritos.length; i++) {
            carritos[i].addEventListener('click', function(e) {
                if(carrito2 =="")
                    carrito2 += this.id;
                else
                    carrito2 +=","+ this.id;

        document.cookie = "carrito="+carrito2 +"; path=/";
});
        }
}
function mostrarMas(){
    pagina = pagina++;

    let div_productos = document.getElementsByClassName('productos')[0];
    for(let x =pagina - 1 ;x< pagina * 12;x++){
        div_productos.innerHTML = div_productos.innerHTML + `
            <div class="col-xl-3 col-md-4 col-6 mt-2">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src= "`+todos_productos[x]['foto']+`" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">`+todos_productos[x]['nombre']+`</h5>
                            <!-- Product price-->
                            {{`+todos_productos[x]['precio']+`}} &euro;
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver M&aacute;s</a></div>
                    </div>
                </div>
            </div>
        `;
    }

}
