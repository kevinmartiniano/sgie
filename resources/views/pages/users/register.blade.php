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
                    <h1 class="display-4">Registrar-se!</h1>
                    <p class="lead">Insira suas informações abaixo.</p>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <form action="/auth/register" method="post">
                        @method('POST')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nome Completo</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Digite seu e-mail">
                            <small id="nameHelp" class="form-text text-muted">Nunca compartilhe seu email com desconhecidos.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Endereço de e-mail</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                            <small id="emailHelp" class="form-text text-muted">Nunca compartilhe seu email com desconhecidos.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar senha</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha">
                        </div>
                        <input type="hidden" name="user_type_id" value="2"/>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                    {{-- <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço de e-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                            <small id="emailHelp" class="form-text text-muted">Nunca compartilhe seu email com desconhecidos.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> --}}
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
