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
        return view('home');
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
        $producto->disponible = 1;
        $producto->cantidadMinima = request('cantidadMinima');

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto_nueva  = $foto->getClientOriginalName();
            $ruta = public_path('fotos/'.$foto_nueva);
            copy($foto,$ruta);
            $producto->foto = 'fotos/'.$foto_nueva;
        }
        else{
            echo '<script type="text/javascript">alert("No entra en foto");</script>';
        }

        $producto->save();

       echo '<script type="text/javascript">alert("Producto insertado correctamente");</script>';

        $productos = Producto::all();
        return redirect('producto/create');
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

    public function update(Request $request, $id)
    {
        
        $producto = Producto::find($id);
        $producto->nombre = request('nombre');
        $producto->precio = request('precio');
        $producto->descripcion = request('descripcion');
        $producto->disponible = request("radioDis");
        $producto->cantidadMinima = request('cantidadMinima');

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto_nueva  = $foto->getClientOriginalName();
            $ruta = public_path('fotos/'.$foto_nueva);
            copy($foto,$ruta);
            $producto->foto = 'fotos/'.$foto_nueva;
        }

        $producto->save();

        echo '<script type="text/javascript">alert("Producto editado correctamente");</script>';

        $productos = Producto::all();
        return redirect('home');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        echo '<script type="text/javascript">alert("Producto eliminado correctamente");</script>';

        return redirect('home');
    }
}
