@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <h1 class="display-4">Lista de alunos do curso {{ $curso->nome }}</h1>
        <p class="lead">Confira abaixo</p>
    </div>
    <related-alunos :alunos="{{ json_encode($alunos) }}"></related-alunos>
</div>
@endsection
