@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <h1 class="display-4">{{ $instituicao->nome }}</h1>
        <p class="lead">Lista de cursos</p>
    </div>
    <related-cursos :cursos="{{ json_encode($cursos) }}"></related-cursos>
</div>
@endsection
