<?php

namespace App\Http\Controllers;

use App\Instituicao;
use App\Curso;
//use Illuminate\Http\Request;
use phpseclib\Crypt\RC2;
use Symfony\Component\HttpFoundation\Request;

class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.instituicoes.list', ['instituicoes' => Instituicao::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instituicao = Instituicao::find($id);
        $cursos = Curso::where('id_instituicao', $id)->get();

        return view('pages.instituicoes.detail', ['instituicao' => $instituicao, 'cursos' => $cursos]);
    }
}
