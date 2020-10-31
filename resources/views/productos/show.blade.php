@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>DETALLE PRODUCTOS</b>
        <a href="{{ route('productos.index')}}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>Volver
        </a>
        </div>
        <div class="card-body">
            <p><b>Nombre</b> {{ $producto->nombre}}</p>
            <p><b>Descripción</b> {{ $producto->descripcion}}</p>
            <p><b>Precio</b> {{ $producto->precio}}</p>
            <p><b>Expiracion</b> {{ $producto->expiracion}}</p>
            <p><b>Stock</b> {{ $producto->stock}}</p>
            <p><b>Proveedor</b> {{ $producto->getProveedor->razonSocial}}</p>
        </div>
        <div class="card-footer">
                <a class="btn btn-primary" href="{{route('productos.edit', $producto->id) }}">
                <i class="fa fa-edit"></i>
                Editar
            </a>
        </div>

</div>
@endsection
