<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $productos = Producto::all();
        // return view('productos', [
        //     'productos' => $productos
        // ]);
        return view('productos');
    }
    public function save(Request $request)
    {
        //comprobar permisos
            
        //mirmaos si el cliente nos ha devuelto un archivo
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto_nueva  = $foto->getClientOriginalName();
            $ruta = public_path('fotos/'.$foto_nueva);
            copy($foto,$ruta);
            $producto = new Producto();
            $producto->foto = $foto_nueva;
            $producto->save();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = request('nombre');
        $producto->precio = request('precio');
        $producto->descripcion = request('descripcion');
        $producto->disponible = request('disponible');
        $producto->cantidadMinima = request('cantidadMinima');

        $producto->save();

       // echo '<script type="text/javascript">alert("Producto insertado correctamente");</script>';

        $productos = Producto::all();
        return view('createProducto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('detalleProducto', [
            'producto' => $producto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('editarProducto', [
            'producto' => $producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
