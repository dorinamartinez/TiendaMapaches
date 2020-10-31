<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Proveedor;
use Faker\Generator as Faker;

$factory->define(Proveedor::class, function (Faker $faker) {
    return [
        'razonSocial'         =>$faker->text(100),
        'nombreCompleto'      =>$faker->name,
        'direccion'           =>$faker->address,
        'telefono'            =>$faker->phoneNumber,
        'correo'              =>$faker->unique()->safeEmail,
        'rfc'                 =>$faker->text(13)
    ];
});
