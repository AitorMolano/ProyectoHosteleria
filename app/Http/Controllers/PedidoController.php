<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Producto;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all()->where('id_cliente','like',Auth::user()->id);
        $carrito_total=[];

        foreach($pedidos as $pedido){
            $productos=[];
            $carrito = Carrito::all()->where('id_pedido','like',$pedido['id']);
            foreach($carrito as $producto){
                $nombre_producto = Producto::find($producto['id_producto'])['nombre'];
                array_push($productos,$nombre_producto);
            }
           
            array_push($carrito_total,['id_pedido'=>$pedido['id'],'productos'=>$productos,'suma'=>$pedido['suma_Precio'],'estado'=>$pedido['estado'],'id_cliente'=>$pedido['id_cliente']]);
        }
        return view('pedidos')->with('carrito_total',$carrito_total);
    }

    public function indexAdmin(){
        $carrito_total=[];
        $pedidos = Pedido::all();
        foreach($pedidos as $pedido){
            $productos=[];
            $carrito = Carrito::all()->where('id_pedido','like',$pedido['id']);
            foreach($carrito as $producto){
                $nombre_producto = Producto::find($producto['id'])['nombre'];
                array_push($productos,$nombre_producto);
            }
            $id_cliente = strval($pedido['id_cliente']);
            $id_cliente_final=0;
            for($i=0;$i< strlen($id_cliente);$i++){
                $id_cliente_final = intval($id_cliente_final ) + intval($id_cliente[$i]);

            }
            array_push($carrito_total,['id_pedido'=>$pedido['id'],'productos'=>$productos,'suma'=>$pedido['suma_Precio'],'estado'=>$pedido['estado'],'id_cliente'=>$id_cliente_final ]);
        }
        // dd($carrito_total);
        
        return view('pedidos-admin')->with('carrito_total',$carrito_total);
    }

   

 
}
