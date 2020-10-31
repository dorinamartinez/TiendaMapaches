@extends('layouts.app')

@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>FORMULARIO PROVEEDORES</b>
        <a href="{{ route('proveedores.index')}}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>Volver
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('proveedores.store')}}" method="POST" enctype="multipart/form-data" id="create">
            @include('proveedores.partials.form')
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