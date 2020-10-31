@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>EDITAR CLIENTES</b>
        <a href="{{ route('clientes.index')}}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>Volver
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('clientes.update', $cliente)}}" method="POST" enctype="multipart/form-data" id="update">
            @method('PUT')
            @include('clientes.partials.form')

            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="update">
                <i class="fa fa-save"></i>
                Guardar Cambios
            </button>
            <button class="btn btn-danger" form="delete_{{ $cliente->id}}" onclick="return confirm('¿Seguro de eliminar?')">
                <i class="fa fa-trash"></i>
                Eliminar
            </button>
            <form action="{{ route('clientes.destroy', $cliente->id)}}" id="delete_{{$cliente->id}}" method="post" enctype="multipart/form-data" hidden>
            @csrf
            @methos('DELETE')
            </form>
        </div>

</div>

@endsection
