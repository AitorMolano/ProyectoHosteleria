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
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <img class="card-img-top img-fluid" src= "`+todos_productos[x]['foto']+`" alt="..." style="height: 300px; width:300px;"/>
                    </div>
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
                    <a class="btn btn-light btn-rounded mr-1" data-toggle="tooltip" href="#" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        `;
    }
}

function mostrarMas(){
    pagina++;
    let valor_x = (pagina -1)*12;
    let valor_limite = valor_x +12;

    let div_productos = document.getElementsByClassName('productos')[0];

    for(let x =valor_x ;x< valor_limite && x<todos_productos.length;x++){
        div_productos.innerHTML = div_productos.innerHTML + `
            <div class="col-xl-3 col-md-4 col-6 mt-2">
                <div class="card h-100">
                    <!-- Product image-->
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <img class="card-img-top img-fluid " src= "`+todos_productos[x]['foto']+`" alt="..."style="height: 300px; width:300px;" />
                    </div>
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
                </div>
            </div>
        `;
        
    }
    if((((pagina -1) * 12) + 12) == todos_productos.length){
        let btn = document.getElementsByClassName('boton')[0];
        btn.innerHTML = '';
        let msg = document.createElement('h5');
        msg.innerHTML= '<h5>No hay más productos</h5>';
        msg.className='d-flex justify-content-center align-items-center mt-2';
        btn.append(msg);
    }
}
