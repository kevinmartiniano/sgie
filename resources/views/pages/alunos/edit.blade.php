@extends('layouts.app')

@section('content')
<div class="container">
    <edit-aluno :aluno="{{ $aluno }}" :curso="{{ $curso }}"></edit-aluno>
</div>
@endsection
