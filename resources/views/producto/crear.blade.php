@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <form method="post" action="{{ route('productos.guardar') }}" enctype="multipart/form-data">
            @csrf
            <label>SKU del producto</label>
            <input type="text" name="sku" id="sku" class="form-control">

            <label>Nombre del producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control">

            <label>Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control">

            <label>Precio</label>
            <input type="text" name="precio" id="precio" class="form-control">

            <label>Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control">

            <label>Imagen del producto</label>
            <input type="file" name="imagen" id="imagen" class="form-control">

            <input type="submit" id="guardar" class="btn btn-primary" value="Guardar">
        </form>
    </div>
@endsection
