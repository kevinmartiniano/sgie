<?php

namespace App\Http\Controllers;

use App\Instituicao;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $instituicoes = Instituicao::all();
        return view('pages.instituicoes.list', ['instituicoes' => $instituicoes]);
    }
}
