<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre'            =>$faker->text(100),
        'descripcion'       =>$faker->text,
        'precio'            =>$faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 3),
        'expiracion'        =>$faker->date($format = 'Y-m-d', $min = 'now',$max = '+2 years'),
        'stock'             =>$faker->numberBetween(20,60),
        'idProveedor'       =>$faker->numberBetween(1,21)
    ];
});
