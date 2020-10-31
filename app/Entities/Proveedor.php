<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //protected $primaryKey ='idProveedor';
    protected $table = 'proveedores';
    protected $fillable = [
    'razonSocial' ,
    'nombreCompleto',
    'direccion' ,
    'telefono',
    'correo',
    'rfc'
    ];


}
