@extends('layouts.app')

@section('content')
    <div class="col-md-7 m-auto">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <h1 class="font-weight-light">SKU: {{ $producto->sku }}</h1>

            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage') . '/' . $producto->image_url }}"
                          class="img-fluid" height="200px">
                </div>
                <div class="col-md-8">
                    <h3 class="font-weight-light">{{ $producto->nombre }}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <strong>Cantidad: </strong>
                </div>
                <div class="col-md-6">{{ $producto->cantidad }}</div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <strong>Precio: </strong>
                </div>
                <div class="col-md-6">{{ $producto->precio }}</div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <strong>Descripción: </strong>
                </div>
                <div class="col-md-6">{{ $producto->descripcion }}</div>
            </div>
        </div>
    </div>
@endsection
