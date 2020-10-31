@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Razon social</label>
            <input type="text" class="form-control" name="razonSocial"
                value="{{ (isset($proveedor))?$proveedor->razonSocial:old('razonSocial')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre completo</label>
            <input type="text" class="form-control" name="nombreCompleto"
                value="{{ (isset($proveedor))?$proveedor->nombreCompleto:old('nombreCompleto')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control" name="direccion"
                value="{{ (isset($proveedor))?$proveedor->direccion:old('direccion')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" class="form-control" name="telefono"
                value="{{ (isset($proveedor))?$proveedor->telefono:old('telefono')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Correo</label>
            <input type="mail" class="form-control" name="correo"
                value="{{ (isset($proveedor))?$proveedor->correo:old('correo')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">RFC</label>
            <input type="text" class="form-control" name="rfc"
                value="{{ (isset($proveedor))?$proveedor->rfc:old('rfc')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre producto</label>
            <input type="text" class="form-control" name="nombre"
                value="{{ (isset($proveedor))?$proveedor->razonSocial:old('razonSocial')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Descripcion producto</label>
            <input type="text" class="form-control" name="descripcion"
                value="{{ (isset($proveedor))?$proveedor->descripcion:old('descripcion')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Precio</label>
            <input type="text" class="form-control" name="precio"
                value="{{ (isset($proveedor))?$proveedor->precio:old('precio')}}" required>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Stock</label>
            <input type="text" class="form-control" name="stock"
                value="{{ (isset($proveedor))?$proveedor->stock:old('stock')}}" required>
        </div>
    </div>

</div>
<div>
