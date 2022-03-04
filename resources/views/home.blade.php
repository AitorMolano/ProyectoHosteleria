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
                        <div class="card-footer d-flex justify-content-around p-4 pt-0 border-top-0 bg-transparent">
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('detalleProd', $producto->id) }}">Ver M&aacute;s</a>
                            <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>     
                    </div>
               </div>
            @endforeach
 @endsection
