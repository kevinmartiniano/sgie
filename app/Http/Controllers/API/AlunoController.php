<?php

namespace App\Http\Controllers\API;

use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    /*
     * Exemplo de JSON
     * {"nome": "Fulano Teste", "cpf": "000.000.000-00", "data_de_nascimento": "1995-02-18", "email": "email@example.com", "celular": "(11) 99999-9999", "endereco": "Rua de teste", "numero": "48", "bairro": "Jd. Teste", "cidade": "Teste", "uf": "SP", "status": 1, "id_curso": 1}
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // GET /api/v1/alunos/
    public function index()
    {
        return Aluno::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // POST /api/v1/alunos/
    public function store(Request $request)
    {
        $this->authorize('create', Aluno::class);
        $curso = Curso::find($request->id_curso);

        if ($curso->status == 1 && $curso->id_instituicao != '') {
            $aluno = Aluno::create($request->all());

            return $aluno;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // GET /api/v1/alunos/{id}
    public function show(Aluno $aluno)
    {
        return $aluno;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // PUT /api/v1/alunos/{id}
    public function update(Request $request, Aluno $aluno)
    {
        $this->authorize('update', $aluno);
        $curso = Curso::find($request->id_curso);

        if ($curso->status == 1) {
            $aluno->update($request->all());

            return $aluno;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // DELETE /api/v1/alunos/{id}
    public function destroy(Aluno $aluno)
    {
        $this->authorize('delete', $aluno);
        $aluno->status = 0;
        $aluno->save();

        return $aluno;
    }
}
