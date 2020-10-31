@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>DETALLE CLIENTES</b>
        <a href="{{ route('clientes.index')}}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>Volver
        </a>
        </div>
        <div class="card-body">
            <p><b>Nombre Completo</b> {{ $cliente->nombre}} {{ $cliente->apellidoPaterno}}  {{$cliente->apellidoMaterno}}</p>
            <p><b>RFC</b> {{ $cliente->rfc}}</p>
            <p><b>Telefono</b> {{ $cliente->telefono}}</p>
            <p><b>E-mail</b> {{ $cliente->correo}}</p>
            <p><b>Direccion</b> {{ $cliente->direccion}}</p>
            <p><b>Producto</b> {{ $cliente->getProducto->nombre}}</p>
        </div>
        <div class="card-footer">
                <a class="btn btn-primary" href="{{route('clientes.edit', $cliente->id) }}">
                <i class="fa fa-edit"></i>
                Editar
            </a>
        </div>

</div>
@endsection
