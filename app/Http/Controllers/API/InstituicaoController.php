<?php

namespace App\Http\Controllers\API;

use App\Aluno;
use App\Instituicao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class InstituicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'getRelCursos']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Instituicao::all();
    }

    public function getRelCursos($id) {
        return Curso::where('id_instituicao', $id)->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Instituicao::class);
        return Instituicao::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Instituicao::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Instituicao::find($id));
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required',
            'status' => 'required'
        ]);

        $instituicao = Instituicao::find($id);
        $instituicao->nome = $request->nome;
        $instituicao->cnpj = $request->cnpj;
        $instituicao->status = $request->status;
        $instituicao->save();

        return $instituicao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Instituicao::find($id));
        $instituicao = Instituicao::find($id);
        $cursos = Curso::where([['id_instituicao', '=', $instituicao->id], ['status', '=', 1]])->get();

        if (!empty($cursos)) {
            foreach ($cursos as $curso) {
                $curso->status = 0;
                $curso->save();

                $alunos = Aluno::where('id_curso', '=', $curso->id)->get();

                foreach ($alunos as $aluno) {
                    $aluno->status = 0;
                    $aluno->save();
                }
            }
        }

        $instituicao->status = 0;
        $instituicao->save();

        return $instituicao;
    }
}
