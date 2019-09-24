@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4">Instituições</h1>
    <p class="lead">Lista de instituições</p>
</div>
<div class="container">
    <list-instituicao :instituicoes="{{ json_encode($instituicoes) }}"></list-instituicao>
</div>
@endsection
