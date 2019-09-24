<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instituicao;
use Faker\Generator as Faker;

$factory->define(Instituicao::class, function (Faker $faker) {
    $count = 10000000000000;
    return [
        'nome' => 'Universidade de ' . $faker->state,
        'cnpj' => $faker->randomNumber(),
        'status' => 1,
    ];
});
