@extends('layouts2.app')

@section('content')
@include('partials.navbar')
<h1>Hola a todos Mapaches</h1>
<h1>{{$mensaje}}</h1>
{!! $html !!}

<h1>ESTRUCTURAS DE CONTROL</h1>
@if ($valor == 0)
    <h3>Es igual a 0</h3>
@elseif ($valor>0)
    <h3>Es mayor a 0</h3>
@elseif ($valor< 0)
    <h3>Es mayor a 0</h3>
@else  
    <h3>es igual a {{ $valor }}</h3>
@endif


@include('partials.footer')
@endsection