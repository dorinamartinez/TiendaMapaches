<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombre'            =>$faker->firstName,
        'apellidoPaterno'   =>$faker->lastName,
        'apellidoMaterno'   =>$faker->lastName,
        'rfc'               =>$faker->text(13),
        'telefono'          =>$faker->phoneNumber,
        'correo'            =>$faker->unique()->safeEmail,
        'direccion'         =>$faker->address,
        'idProducto'        =>$faker->numberBetween(1,20)
    ];
});
