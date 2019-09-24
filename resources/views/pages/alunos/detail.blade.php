@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <h1 class="display-4">Detalhes do aluno {{ $aluno->nome }}</h1>
        <p class="lead">Confira abaixo</p>
    </div>
    <edit-aluno :aluno="{{ $aluno }}" :curso="{{ $curso }}"></edit-aluno>
</div>
@endsection
