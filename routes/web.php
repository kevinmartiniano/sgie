<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resources([
    'instituicoes' => 'InstituicaoController',
    'cursos' => 'CursoController',
    'alunos' => 'AlunoController',
], [
    'only' => [
        'index', 'show', 'edit'
    ],
]);

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
