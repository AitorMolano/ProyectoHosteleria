<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function show($id){
        $pedido = Pedido::find($id);
        $estado=0;
        switch($pedido['estado']){
            case 'recibido': $estado =1;
                break;
            case 'en proceso':$estado=2;
                break;
            case 'preparado':$estado = 3;
                break;
        }
        $estado_porcentaje = ($estado * 100)/3;
        
        return view('estado')->with('estado_porcentaje',$estado_porcentaje)->with('estado',$pedido['estado']);

    }

    
}
