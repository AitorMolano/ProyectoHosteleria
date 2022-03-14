var estadisticas = [];
var ano1 = [];
var ano2 = [];
var ano3 = [];
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: 'estadisticas/controller',
        success: function(json){
            console.log(json);
            
            estadisticas = json['estadisticas'];
            estadisticas_obtener();
            estadisticas_mostrar();
        }
           
    });
})

function estadisticas_obtener(){
    cantidad = estadisticas.length;
    console.log(estadisticas);
    for(let z=0; z<12 ;z++){
        ano1.push(estadisticas[z][1].length);
    }
    for(let z=12; z<24 ;z++){
        ano2.push(estadisticas[z][1].length);
    }
    for(let z=24; z<cantidad;z++){
        ano3.push(estadisticas[z][1].length);
    }
    console.log(ano3);
}
        
        
    

function estadisticas_mostrar(){
    console.log("Mostrar");
    const chart = Highcharts.chart('container', {

        title: {
            text: 'Recibidos'
        },
        chart: {
            backgroundColor: 'transparent',
        },
        subtitle: {
            text: 'Cantidad de recibidos al mes'
        },
    
        yAxis: {
            title: {
                text: 'Cantidad'
            }
        },
    
        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        },
    
        legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
            }
        },
        
    
        series: [{
            name: 'Primer año',
            data: ano1
        }, {
            name: 'Segundo año',
            data: ano2
        }, {
            name: 'Tercer año',
            data: ano3
        }],
    });
}