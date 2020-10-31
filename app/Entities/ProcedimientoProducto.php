<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProcedimientoProducto extends Model
{
    public static function procedimientoUnion($datos = []){
        $result = false;
        if (count($datos)>0) {
            $result = \DB::statement('call procedimientoUnion(?,?,?,?,?,?,?,?,?,?)',$datos);
        }
        return $result;
    }
}
