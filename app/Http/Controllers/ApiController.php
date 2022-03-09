<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function productos(){
        $productos = Producto::all();

        return response()->json([
            'ok' => true,
            'productos' => $productos
        ],200);
    }
}
