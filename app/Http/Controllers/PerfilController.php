<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index(){
        return view('perfil');
    }

    public function store(Request $request){
      
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $r_password = $request['rpassword'];
        $telefono = $request['telefono'];
        $direccion = $request['direccion'];

        if($password == $r_password){
            $user = User::find(Auth::user()->id);
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->telefono = $telefono;
            $user->direccion = $direccion;
            $user->save();
           return redirect('/')->with('perfil',true);
        }
      
    }
}
