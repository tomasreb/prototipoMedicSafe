<?php

use Faker\Generator as Faker;

$factory->define(App\Medic::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'specialty' => $faker->randomElement(['clinica','otorrinolaringologia','psiquiatria','traumatologia','oncologia','neurologia','pediatria','cardiologia']),
        'matricula' => $faker->unique()->randomNumber($nbDigits = 6),
        'tel_cel' =>$faker->phoneNumber,
        'tel_fijo' => $faker->phoneNumber,
    ];
});
