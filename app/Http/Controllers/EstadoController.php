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
            case 'pedido enviado': $estado =1;
                break;
            case 'en proceso': $estado =2;
                break;
            case 'en camino':$estado=3;
                break;
            case 'recibido':$estado = 4;
                break;
        }
        $estado_porcentaje = ($estado * 100)/4;
        
        return view('estado')->with('estado_porcentaje',$estado_porcentaje)->with('estado',$pedido['estado'])->with('id',$id);

    }

    public function update(Request $request){
   
        $id_pedido = $request['id_pedido'];
        $nuevo_estado = $request['estado'];
        
        $pedido = Pedido::find($id_pedido);
        $pedido->estado = $nuevo_estado;
        $pedido->save();

        return redirect('/')->with('estado',true);
    }
}
