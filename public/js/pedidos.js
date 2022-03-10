$(document).ready(function(){
   
    document.getElementById('estado-nuevo').addEventListener('change',cambiarEstado);
})

function cambiarEstado(){
    console.log($('#estado-nuevo').val());
    let data ={
        'nuevo_estado' : $('#estado-nuevo').val()[0]
    }

    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } 
    });

    $.ajax({
        type:'POST',
        url:'/api/pedidos',
        data: data,
        success:function(data){
            console.log(data);
        },
        error:function(error){
            console.log(error);
        }

    })

    
}