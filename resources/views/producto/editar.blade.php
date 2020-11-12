@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <form method="post" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label>SKU del producto</label>
            <input type="text" name="sku" id="sku" class="form-control"
                   value="{{ $producto->sku }}">

            <label>Nombre del producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                   value="{{ $producto->nombre }}">

            <label>Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control"
                   value="{{ $producto->cantidad }}">

            <label>Precio</label>
            <input type="text" name="precio" id="precio" class="form-control"
                   value="{{ $producto->precio }}">

            <label>Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control"
                   value="{{ $producto->descripcion }}">

            <label>Imagen del producto</label>
            <img src="{{ asset('storage') . '/' . $producto->image_url }}"
                 class="img-fluid" height="200px">
            <input type="file" name="imagen" id="imagen" class="form-control">

            <input type="submit" id="guardar" class="btn btn-primary" value="Guardar">
        </form>
    </div>
@endsection
