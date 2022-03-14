var todos_productos = [];
var productos_filtrados = [];
var pagina = 1;
var carrito="";
 
$(document).ready(function(){
    obtenerDatos();
    document.getElementById('categorias').addEventListener('change',filtroCategoria);
    document.getElementById('nombre').addEventListener('keyup',mostrarLetras);
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
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 mt-2">
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
                    <p class="btn btn-white btn-rounded mr-1 carrito" data-toggle="tooltip " id="`+todos_productos[x]['id']+`"data-original-title="Add to cart">
                            <i class="fa fa-shopping-cart" ></i>
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
            mostrarAlert()
        });
    }

    if(document.getElementById('compra').value){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Compra realizada',
            showConfirmButton: false,
            timer: 1500
          })
    }

    if(document.getElementById('producto_guardado').value){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Producto guardado',
            showConfirmButton: false,
            timer: 2000
          })
    }

    if(document.getElementById('estado').value){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Estado actualizado',
            showConfirmButton: false,
            timer: 1500
          })
    }

    if(document.getElementById('producto_actualizado').value){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Producto actualizado',
            showConfirmButton: false,
            timer: 1500
          })
    }

    if(document.getElementById('perfil').value){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Perfil actualizado',
            showConfirmButton: false,
            timer: 1500
          })
    }
    if(document.getElementById('eliminar').value){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Producto eliminado',
            showConfirmButton: false,
            timer: 1500
          })
    }
}

function mostrarMas(){
    pagina++;
    let valor_x = (pagina -1)*12;
    let valor_limite = valor_x +12;
    let div_productos = document.getElementsByClassName('productos')[0];

    for(let x =valor_x ;x< valor_limite && x<todos_productos.length;x++){
        div_productos.innerHTML = div_productos.innerHTML + `
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 mt-2">
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
                    <p class="btn btn-white btn-rounded mr-1 carrito" data-toggle="tooltip" id="`+todos_productos[x]['id']+`" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart"></i>
                    </p>
                </div>
            </div>
        `;
        
    }
    
    if(valor_limite == todos_productos.length || valor_limite > todos_productos.length){
        let btn = document.getElementsByClassName('boton')[0];
        btn.innerHTML = '';
        let msg = document.createElement('h5');
        msg.innerHTML= '<h5>No hay más productos</h5>';
        msg.className='d-flex justify-content-center align-items-center mt-2';
        btn.append(msg);
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

function filtroCategoria(){
    productos_filtrados = [];
    let categoria = document.getElementById('categorias').value;
   

    switch(categoria){
        case 'Categoria':productos_filtrados = todos_productos;
        mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Fritos':
                for(let x =0;x<todos_productos.length;x++){
                    if(todos_productos[x]['categoria'] == 1){
                        productos_filtrados.push(todos_productos[x]);
                    }
                }
                mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Entrantes':
                for(let x =0;x<todos_productos.length;x++){
                    if(todos_productos[x]['categoria'] == 11){
                        productos_filtrados.push(todos_productos[x]);
                    }
                }
                mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Pescado':
            for(let x =0;x<todos_productos.length;x++){
                if(todos_productos[x]['categoria'] == 21){
                    productos_filtrados.push(todos_productos[x]);
                }
            }
            mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Carne':
            for(let x =0;x<todos_productos.length;x++){
                if(todos_productos[x]['categoria'] == 31){
                    productos_filtrados.push(todos_productos[x]);
                }
            }
            mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Semifrios':
            for(let x =0;x<todos_productos.length;x++){
                if(todos_productos[x]['categoria'] == 41){
                    productos_filtrados.push(todos_productos[x]);
                }
            }
            mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Tarta de bizcocho':
            for(let x =0;x<todos_productos.length;x++){
                if(todos_productos[x]['categoria'] == 51){
                    productos_filtrados.push(todos_productos[x]);
                }
            }
            mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Tarta de hojaldre':
            for(let x =0;x<todos_productos.length;x++){
                if(todos_productos[x]['categoria'] == 61){
                    productos_filtrados.push(todos_productos[x]);
                }
            }
            mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Tartas variadas':
            for(let x =0;x<todos_productos.length;x++){
                if(todos_productos[x]['categoria'] == 71){
                    productos_filtrados.push(todos_productos[x]);
                }
            }
            mostrarProductosFiltrados(productos_filtrados);
            break;
        case 'Variedades':
            for(let x =0;x<todos_productos.length;x++){
                if(todos_productos[x]['categoria'] == 81){
                    productos_filtrados.push(todos_productos[x]);
                }
            }
            mostrarProductosFiltrados(productos_filtrados);
            break;
    }
}

function mostrarProductosFiltrados(productos_filtrados){

    let div_productos = document.getElementsByClassName('productos')[0];

    div_productos.innerHTML='';

    for(let x =0;x<productos_filtrados.length;x++){
        div_productos.innerHTML = div_productos.innerHTML + `
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 mt-2">
            <div class="card h-100">
                <!-- Product image-->
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <img class="card-img-top img-fluid " src= "`+productos_filtrados[x]['foto']+`" alt="..."style="height: 300px; width:300px;" />
                </div>
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">`+productos_filtrados[x]['nombre']+`</h5>
                        <!-- Product price-->
                        `+productos_filtrados[x]['precio']+` &euro;
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="producto/`+productos_filtrados[x]['id']+`">Ver M&aacute;s</a></div>
                </div>
                <p class="btn btn-white btn-rounded mr-1 carrito" data-toggle="tooltip" id="`+productos_filtrados[x]['id']+`" data-original-title="Add to cart">
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

function mostrarLetras(){
    productos_filtrados=[];
    let nombre = document.getElementById('nombre').value;
    
    console.log(nombre);
    console.log(nombre.length);
    for(let x=0;x<todos_productos.length;x++){
        if(todos_productos[x]['nombre'].includes(nombre)){
            productos_filtrados.push(todos_productos[x]);
        }
    }
    mostrarProductosFiltrados(productos_filtrados);
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