<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function productos(){
        
        $user = Auth::user();

        if($user &&  $user->rol == 1){
            // si user no es null && user es admin carga todos
            $productos = Producto::all();
        }
        else{
            // si no, carga solo los disponibles
            $productos = Producto::where('disponible','like',1)->get()->toArray();
            $productos = array_values($productos);
        }
        

        return response()->json([
            'ok' => true,
            'productos' => $productos,
            'user' => $user,
        ],200);
     
    }

  
}
