<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;
use Illuminate\Http\Request;
class ApiController extends Controller
{
    public function productos(){
        $productos = Producto::where('disponible','like',1)->get()->toArray();
        $productos = array_values($productos);
        

        return response()->json([
            'ok' => true,
            'productos' => $productos
        ],200);
    }

    public function obtenerEstadisticas() {

        $hoy = date('Y-m-d ');
        $ayer = date('Y-m-d', strtotime ( '- 1 month' , strtotime ( $hoy ) ));
        $en_cursos = Pedido::where('estado','en proceso')->whereDate('created_at','>=',$ayer)->whereDate('created_at','<',$hoy)->get();
        $preparados = Pedido::where('estado','preparado')->whereDate('created_at','>=',$ayer)->whereDate('created_at','<',$hoy)->get();
        $recibidos = Pedido::where('estado','recibido')->whereDate('created_at','>=',$ayer)->whereDate('created_at','<',$hoy)->get();
        
        $meses = [36,35,34,33,32,31,30,29,28,27,26,25,24,23,22,21,20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1];
 
        $estadisticas = array();
        $ya = 0;
        foreach($meses as $el_mes){
            
            $mes_1 = date('Y-m-d', strtotime ( '-'.$el_mes.' month' , strtotime ( $hoy ) ));
            $mes = date('Y-m-d', strtotime ( '+ 1 month' , strtotime ( $mes_1 ) ));
            $n_mes=date("n",strtotime($mes_1));
            
            if($ya ==1){
                $el_recibido = Pedido::where('estado','recibido')->whereDate('created_at','>=',$mes_1)->whereDate('created_at','<',$mes)->get();
                $c_recibido[0] = $mes_1;
                $c_recibido[1] = $el_recibido;
            if($c_recibido[1])
                array_push($estadisticas,$c_recibido);
            }
            if( $n_mes == 11){
                $ya=1;
            }
        }
        return response()->json([
            'estadisticas' => $estadisticas
        ], 200);
    }
}
