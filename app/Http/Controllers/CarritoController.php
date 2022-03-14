<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user())
        {
            echo '<script type="text/javascript">alert("Has iniciado sesion");</script>';
            return view('carrito');
        }
        else{
            // no se ejecuta por el redirect :: echo '<script type="text/javascript">alert("Inicia sesion primero");</script>';
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $pedido = new Pedido;
        $pedido->id_cliente = request('id_cliente');
        $pedido->suma_Precio = request('suma_precio');
        $pedido->estado = "pedido enviado";
        $pedido->save();

        
        $productos = $_COOKIE['carrito'];
        $productos_array = explode(',',$productos);
        
        $pedido = Pedido::all();
        $id_ultimoPedido = $pedido[sizeof($pedido)-1]['id'];
        foreach($productos_array as $producto){ 
            $carrito = new Carrito;
            $carrito->id_producto = $producto;
            $carrito->id_pedido = $id_ultimoPedido;
            $carrito->save();
        }

        unset($_COOKIE['carrito']);
        setcookie('carrito', null, -1, '/'); 
        $productos = Producto::all();
        return view('home')->with('compra_realizada',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        $lleno = 0;
        $productos="";

        if (isset($_COOKIE["carrito"]) || $_COOKIE['carrito']=="") {
            $productos = Producto::all();
            $lleno = 1;
        }

        return view('carrito', [
            'productos' => $productos,
            'lleno' => $lleno
        ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }
}
