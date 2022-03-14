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

    
        $enviados = Pedido::where('estado','pedido enviado')->get();
        $en_cursos = Pedido::where('estado','en proceso')->get();
        $en_caminos = Pedido::where('estado','en camino')->get();
        $recibidos = Pedido::where('estado','recibido')->get();

        return view('estadisticas', [
            'enviados' => $enviados,
            'pedidos' => $pedidos,
            'en_cursos' => $en_cursos,
            'en_caminos' => $en_caminos,
            'recibidos' => $recibidos,
        ]);
    }
}
