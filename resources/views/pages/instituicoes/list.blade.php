@extends('layouts.app')

@section('content')
<div class="container">
    <list-instituicao :instituicoes="{{ json_encode($instituicoes) }}"></list-instituicao>
</div>
@endsection
