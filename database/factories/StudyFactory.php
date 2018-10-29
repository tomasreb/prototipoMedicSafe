<?php

use Faker\Generator as Faker;

$factory->define(App\Study::class, function (Faker $faker) {
    return [
        'part_id'=> rand(1,10),
        'informe' =>$faker->sentence(),
        'name' =>$faker->sentence(),
        'lugar_atencion' =>$faker->sentence(),
        'medic_id'=> rand(1,10),
    ];
});
