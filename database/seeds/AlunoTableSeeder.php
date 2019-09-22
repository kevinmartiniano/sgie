<?php

use App\Aluno;
use Illuminate\Database\Seeder;

class AlunoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Aluno::class, 2000)->create();
    }
}
