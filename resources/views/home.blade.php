@extends('layouts.layout')
@section('content')
@foreach ($productos as $producto) 
               <div class="col-xl-3 col-md-4 col-6 mt-2">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src= {{ $producto->foto }} alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$producto->nombre}}</h5>
                                <!-- Product price-->
                                {{$producto->precio}} &euro;
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver M&aacute;s</a></div>
                        </div>
                    </div>
               </div>
            @endforeach
@endsection
