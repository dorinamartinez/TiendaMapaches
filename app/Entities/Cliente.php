<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //protected $primaryKey ='idCliente';
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'rfc',
        'telefono',
        'correo',
        'direccion',
        'idProducto'
    ];

    public function getProducto(){
        return $this->belongsTo('App\Entities\Producto','idProducto','id');
    }
}
