<?php

use App\Instituicao;
use Illuminate\Database\Seeder;

class InstituicaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Instituicao::class, 10)->create();
    }
}
