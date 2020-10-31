@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>EDITAR PROVEEDORES</b>
        <a href="{{ route('proveedores.index')}}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>Volver
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('proveedores.update', $proveedor)}}" method="POST" enctype="multipart/form-data" id="update">
            @method('PUT')
            @include('proveedores.partials.form')

            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="update">
                <i class="fa fa-save"></i>
                Guardar Cambios
            </button>
            <button class="btn btn-danger" form="delete_{{ $proveedor->id}}" onclick="return confirm('¿Seguro de eliminar?')">
                <i class="fa fa-trash"></i>
                Eliminar
            </button>
            <form action="{{ route('proveedores.destroy', $proveedor->id)}}" id="delete_{{$proveedor->id}}" method="post" enctype="multipart/form-data" hidden>
            @csrf
            @methos('DELETE')
            </form>
        </div>

</div>

@endsection
