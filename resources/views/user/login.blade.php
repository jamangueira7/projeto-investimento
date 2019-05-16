<!DOCTYPE html>
<html>
 <head>
     <meta charset="utf-8">
     <title>Loing | Investindo</title>
     <link rel="stylesheet" href="{{asset('/css/stylesheet.css')}}">
     <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/alerts.css') }}">
 </head>
 <body>

    <div class="background"></div>
    <section id="conteudo-view" class="login">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')['messages']}}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{session('error')['messages']}}
            </div>
        @endif
        <h1>Investindo</h1>
        <h3>O nosso gerenciador de investimento</h3>

        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
            <p>Acesse o sistema</p>
            <label>
                {!! Form::text('username',null, ['class' => 'input', 'placeholder' => 'Usuário']) !!}
            </label>
            <label>
                {!! Form::password('password',['placeholder' => 'Senha']) !!}
            </label>
            {!! Form::submit('Entrar') !!}
        {!! Form::close() !!}
    </section>
 </body>
</html>
