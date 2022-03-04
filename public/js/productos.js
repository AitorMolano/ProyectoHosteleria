var todos_productos = [];
var pagina = 1;
 
$(document).ready(function(){
    obtenerDatos();
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
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver M&aacute;s</a></div>
                        <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                    </div>
                </div>
            </div>
        `;
    }
}

function mostrarMas(){
    console.log(pagina)
    pagina ++;

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
                            `+todos_productos[x]['precio']+` &euro;
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
