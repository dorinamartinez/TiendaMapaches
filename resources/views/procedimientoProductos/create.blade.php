@extends('layouts.app')
@section('content')
    <div class="card mt-3">
        <div class="card-header d-inline-flex">
            <b>FORMULARIO EJEMPLO PROCEDIMIENTO ALMACENADO</b>
            <a href="{{ route('proveedores.index') }}" class="btn btn-primary ml-auto">
            <i class="fa fa-arrow-left"></i>Volver</a>
        </div>
        <div class="card-body">
            <form action="{{ route('procedimientoProductos.store')}}" method="POST"
            enctype="multipart/form-data" id="create">
             @include('procedimientoProductos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" form="create">
                <i class="fa fa-plus"></i>
                Crear
            </button>
        </div>
    </div>
@endsection
