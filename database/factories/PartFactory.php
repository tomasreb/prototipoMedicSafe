<?php

use Faker\Generator as Faker;

$factory->define(App\Part::class, function (Faker $faker) {
    return [
        'medic_id'=> rand(1,10),
        'history_id'=> rand(1,10),


        'motivo' => $faker->sentence(),
        'sintomas' => $faker->sentence(),
        'enfermedad_actual'=> $faker->sentence(),
        'diagnostico' => $faker->sentence(),
        'tratamiento' =>$faker->sentence(),
        'solicito_estudios' => $faker->randomElement(['SI', 'NO']),
        'estudio_solicitado' =>$faker->sentence(),
        'lugar_atencion' =>$faker->randomElement(['hospital clemente alvarez','hospital centenario', 'consultorio particular', 'hospital provincial','consultorio particular','hospital español','sanatorio plaza',]),
    ];
});
