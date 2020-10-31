@csrf
<div class="row">
<div clas="form-group">
    <div class="col-12">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ (isset($cliente))?$cliente->nombre:old('nombre') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Apellido Paterno</label>
    <input type="text" class="form-control" name="apellidoPaterno" value="{{ (isset($cliente))?$cliente->apellidoPaterno:old('apellidoPaterno') }}">
</div>
</div>

<div clas="form-group">
    <div class="col-12">
        <label for="">Apellido Materno</label>
        <input type="text" class="form-control" name="apellidoMaterno" value="{{ (isset($cliente))?$cliente->apellidoMaterno:old('apellidoMaterno') }}">
    </div>
</div>

<div clas="form-group">
    <div class="col-12">
        <label for="">RFC</label>
        <input type="text" class="form-control" name="rfc" value="{{ (isset($cliente))?$cliente->rfc:old('rfc') }}">
    </div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Telefono</label>
    <input type="text" class="form-control" name="telefono" value="{{ (isset($cliente))?$cliente->telefono:old('telefono') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">E-mail</label>
    <input type="mail" class="form-control" name="correo" value="{{ (isset($cliente))?$cliente->correo:old('correo') }}">
</div>
</div>

<div clas="form-group">
    <div class="col-12">
        <label for="">Direccion</label>
        <input type="text" class="form-control" name="direccion" value="{{ (isset($cliente))?$cliente->direccion:old('direccion') }}">
    </div>
</div>

<div clas="form-group">
    <div class="col-12">
        <label for="">Producto</label>
        <select name="idProducto" value="{{ (isset($cliente))?$cliente->idProducto:old('idProducto') }}">
            @foreach ($productos as $producto)
            <option value="{{ $producto->id }}"> {{ $producto->nombre }}</option>
            @endforeach
        </select>
    </div>
    </div>

</div>
