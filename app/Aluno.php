<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'data_de_nascimento',
        'email',
        'celular',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'status',
        'id_curso',
    ];

    public function curso() {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}
