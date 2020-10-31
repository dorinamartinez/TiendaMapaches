<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //protected $primaryKey ='idProducto';
    protected $foreingKey='idProveedor';
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'expiracion',
        'stock'
    ];

    public function getProveedor(){
        return $this->belongsTo('App\Entities\Proveedor','idProveedor','id');
    }
}
