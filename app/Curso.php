<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome',
        'duracao',
        'status',
        'id_instituicao'
    ];

    public function instituicao() {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }
}
