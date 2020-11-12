@extends('layouts.app')

@section('content')
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Sku</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Imagen</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($producto as $item)
            <tr>
                <th scope="row">{{ $item->sku }}</th>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>{{ $item->precio }}</td>
                <td>{{ $item->descripcion }}</td>
                <td><img src="{{ asset('storage') . '/' . $item->image_url }}"
                         width="100px" height="100px">
                </td>
                <td><a href="{{ route('productos.edit', $item) }}"
                       class="btn btn-warnign">Editar</a>

                    <form action="{{ route('productos.destroy', $item) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
