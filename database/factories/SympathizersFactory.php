<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Sympathizer;
use Faker\Generator as Faker;

$factory->define(Sympathizer::class, function (Faker $faker) {
    return [
        'clave_elector' =>$faker->sentence(2,true),
        'nombre' => $faker->name,
        'paterno' => $faker->lastName,
        'materno' => $faker->lastName,
      //  'distrito' => $faker->name,
        'seccion' => $faker->sentence(5, false),
        'calle' => $faker->state,
        'cruzamiento' => $faker->address,
        'no_ext' => $faker->address,
        'no_int' => $faker->address,
        'colonia' => $faker->address,
        'cp' => $faker->name,
        'fe_nacimiento' => $faker->dateTime,
        'celular' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'facebook' => $faker->name,
        'gestion' => $faker->name,
        //'gestion' => $faker->name,
        'user_id' => 1,
    ];
});
