<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@needLogin']);
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group(['prefix' => 'v1', 'namespace' => 'API'], function () {
    Route::resources([
        'alunos' => 'AlunoController',
        'cursos' => 'CursoController',
        'instituicoes' => 'InstituicaoController',
    ], [
        'except' => [
            'create', 'edit'
        ]
    ]);
});
