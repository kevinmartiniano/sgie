<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use App\Instituicao;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'nome' => $faker->words(30),
        'duracao' => $faker->randomDigit,
        'status' => 1,
        'id_instituicao' => Instituicao::inRandomOrder()->first()->id,
    ];
});
