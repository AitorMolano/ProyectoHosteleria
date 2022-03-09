<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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
}
