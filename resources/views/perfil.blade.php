@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12 d-sm-flex justify-content-sm-center align-items-sm-center">
            <p>Hola,{{Auth::user()->name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-sm-flex justify-content-sm-center align-items-sm-center">
            <form action="{{ route('perfil.store') }}" method="post">
                @csrf
                <input type="text" name="name" id="name"  class="form-control rounded-pill" value="{{Auth::user()->name}}"/>
                <input type="email" name="email" id="email"  class="form-control rounded-pill mt-2" value="{{Auth::user()->email}}"/>
                <input type="password" name="password" id="password"  class="form-control rounded-pill mt-2" value="{{Auth::user()->password}}"/>
                <input type="password" name="rpassword" id="rpassword"  class="form-control rounded-pill mt-2" value="{{Auth::user()->password}}"/>
                <input type="tel" name="telefono" id="telefono"  class="form-control rounded-pill mt-2" value="{{Auth::user()->telefono}}"/>
                <input type="text" name="direccion" id="direccion"  class="form-control rounded-pill mt-2" value="{{Auth::user()->direccion}}"/>
                <div class="row">
                    <div class="col-12">
                    <button type="submit" class=" col-12 btn btn-outline-purple">Aceptar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection