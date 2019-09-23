<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="/instituicoes/">Home</a>
                </li>
            </ul>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Detalhes</h1>
                    <p class="lead">Informações detalhadas abaixo.</p>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-3">
                            Nome:
                        </div>
                        <div class="col">
                            {{ $aluno->nome }}
                        </div>
                        <div class="col col-lg-3">
                            CPF:
                        </div>
                        <div class="col">
                            {{ $aluno->cpf }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-3">
                            Data de Nascimento:
                        </div>
                        <div class="col">
                            {{ $aluno->data_de_nascimento }}
                        </div>
                        <div class="col col-lg-3">
                            Email:
                        </div>
                        <div class="col">
                            {{ $aluno->email }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-3">
                            Celular:
                        </div>
                        <div class="col">
                            {{ $aluno->celular }}
                        </div>
                        <div class="col col-lg-3">
                            Endereço:
                        </div>
                        <div class="col">
                            {{ $aluno->endereco }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-3">
                            Número:
                        </div>
                        <div class="col">
                            {{ $aluno->numero }}
                        </div>
                        <div class="col col-lg-3">
                            Bairro:
                        </div>
                        <div class="col">
                            {{ $aluno->bairro }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-3">
                            Cidade:
                        </div>
                        <div class="col">
                            {{ $aluno->cidade }}
                        </div>
                        <div class="col col-lg-3">
                            UF:
                        </div>
                        <div class="col">
                            {{ $aluno->uf }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-3">
                            Status:
                        </div>
                        <div class="col">
                            @if ($aluno->status == 1)
                                Ativo
                            @else
                                Inativo
                            @endif
                        </div>
                        <div class="col col-lg-3">
                            Curso:
                        </div>
                        <div class="col">
                            <a href="/cursos/{{ $curso->id }}">
                                {{ $curso->nome }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
