@csrf
<div class="row">
<div clas="form-group">
    <div class="col-12">
    <label for="">Razon Social</label>
    <input type="text" class="form-control" name="razonSocial" value="{{ (isset($proveedor))?$proveedor->razonSocial:old('razonSocial') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Nombre Completo</label>
    <input type="text" class="form-control" name="nombreCompleto" value="{{ (isset($proveedor))?$proveedor->nombreCompleto:old('nombreCompleto') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="{{ (isset($proveedor))?$proveedor->direccion:old('direccion') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Telefono</label>
    <input type="text" class="form-control" name="telefono" value="{{ (isset($proveedor))?$proveedor->telefono:old('telefono') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">E-mail</label>
    <input type="mail" class="form-control" name="correo" value="{{ (isset($proveedor))?$proveedor->correo:old('correo') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">RFC</label>
    <input type="text" class="form-control" name="rfc" value="{{ (isset($proveedor))?$proveedor->rfc:old('rfc') }}">
</div>
</div>
</div>