@csrf
<div class="row">
<div clas="form-group">
    <div class="col-12">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ (isset($producto))?$producto->nombre:old('nombre') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ (isset($producto))?$producto->descripcion:old('descripcion') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Precio</label>
    <input type="text" class="form-control" name="precio" value="{{ (isset($producto))?$producto->precio:old('precio') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Expiracion</label>
    <input type="date" format="YYYY-MM-DD" class="form-control" name="expiracion" value="{{ (isset($producto))?$producto->expiracion:old('expiracion') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Stock</label>
    <input type="mail" class="form-control" name="stock" value="{{ (isset($producto))?$producto->stock:old('stock') }}">
</div>
</div>

<div clas="form-group">
<div class="col-12">
    <label for="">Proveedor</label>
    <select name="idProveedor" value="{{ (isset($producto))?$producto->idProveedor:old('idProveedor') }}">
        @foreach ($proveedores as $proveedor)
        <option value="{{ $proveedor->id }}"> {{ $proveedor->razonSocial }}</option>
        @endforeach
    </select>
</div>
</div>
</div>
