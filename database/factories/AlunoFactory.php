<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aluno;
use App\Curso;
use Faker\Generator as Faker;

$factory->define(Aluno::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' => $faker->unique()->randomNumber(),
        'data_de_nascimento' => $faker->date('Y-m-d'),
        'email' => $faker->unique()->safeEmail,
        'celular' => $faker->phoneNumber,
        'endereco' => $faker->streetName,
        'numero' => $faker->randomNumber(4),
        'bairro' => $faker->state,
        'cidade' => $faker->city,
        'uf' => $faker->stateAbbr,
        'status' => 1,
        'id_curso' => Curso::inRandomOrder()->first()->id,
    ];
});
