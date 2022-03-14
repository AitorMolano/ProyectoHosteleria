<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;

class EstadisticaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
        $pedidos = Pedido::all();
        $hoy = date('Y-m-d ');
        $ayer = date('Y-m-d', strtotime ( '- 1 month' , strtotime ( $hoy ) ));
        $enviados = Pedido::where('estado','producto enviado')->whereDate('created_at','>=',$ayer)->whereDate('created_at','<',$hoy)->get();
        $en_cursos = Pedido::where('estado','en proceso')->whereDate('created_at','>=',$ayer)->whereDate('created_at','<',$hoy)->get();
        $en_caminos = Pedido::where('estado','en camino')->whereDate('created_at','>=',$ayer)->whereDate('created_at','<',$hoy)->get();
        $recibidos = Pedido::where('estado','recibido')->whereDate('created_at','>=',$ayer)->whereDate('created_at','<',$hoy)->get();
        
        $meses = [36,35,34,33,32,31,30,29,28,27,26,25,24,23,22,21,20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1];
        $c_en_cursos = array();
        $c_preparados = array();
        $c_recibidos = array();
        $ya = 0;
        foreach($meses as $el_mes){
            
            $mes_1 = date('Y-m-d', strtotime ( '-'.$el_mes.' month' , strtotime ( $hoy ) ));
            $mes = date('Y-m-d', strtotime ( '- 1 month' , strtotime ( $mes_1 ) ));
            $n_mes=date("n",strtotime($mes_1));
            
            if($ya ==1){
            $el_recibido = Pedido::where('estado','recibido')->whereDate('created_at','>=',$mes_1)->whereDate('created_at','<',$mes)->get();
            $c_recibido[0] = $mes_1;
            $c_recibido[1] = $el_recibido;
            if($c_recibido[1])
                array_push($c_recibidos,$c_recibido);
            }
            if( $n_mes == 11){
                $ya=1;
            }
        }
        
        return view('estadisticas', [
            'c_recibidos' =>  $c_recibidos,
            'enviados' => $enviados,
            'pedidos' => $pedidos,
            'en_cursos' => $en_cursos,
            'en_caminos' => $en_caminos,
            'recibidos' => $recibidos,
        ]);
    }
}
