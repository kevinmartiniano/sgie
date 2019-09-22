<?php

use App\Curso;
use App\Instituicao;
use Illuminate\Database\Seeder;

class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 1,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 1,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 2,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 2,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 3,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 3,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 4,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 4,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 5,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 5,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 6,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 6,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 7,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 7,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 8,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 8,
        ]);

        \App\Curso::insert([
            'nome' => 'Sistemas de Informação',
            'duracao' => 4000,
            'status' => 1,
            'id_instituicao' => 9,
        ]);

        \App\Curso::insert([
            'nome' => 'Analise e Desenvolvimento de Sistemas',
            'duracao' => 2500,
            'status' => 1,
            'id_instituicao' => 9,
        ]);
    }
}
