<?php

namespace App\Http\Controllers\API;

use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'getRelAlunos']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Curso::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Curso::class);
        $count = Curso::where([['nome', '=', $request->nome], ['id_instituicao', '=', $request->id_instituicao]])->get()->count();

        if ($count == 0) {
            $curso = Curso::create($request->all());

            return $curso;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return $curso;
    }

    public function getRelAlunos($id) {
        return Aluno::where('id_curso', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $this->authorize('update', $curso);
        $curso->update($request->all());

        return $curso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $this->authorize('delete', $curso);
        $alunos = Aluno::where([['id_curso', '=', $curso->id], ['status', '=', 0]])->get();

        if (!empty($alunos)) {
            foreach ($alunos as $aluno) {
                $aluno->status = 0;
                $aluno->save();
            }
        }

        $curso->status = 0;
        $curso->save();

        return $curso;
    }
}
