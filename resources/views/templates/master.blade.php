<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Investindo</title>
        <?php
        ini_set('default_charset','UTF-8');
        ?>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="pt-br">
        @yield('css-view')
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
        <link rel="stylesheet" href="{{ asset('css/alerts.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
    <body>
        @include('templates.menu-lateral')
        <section id="view-conteudo">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')['messages']}}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{session('error')['messages']}}
                </div>
            @endif
            @yield('conteudo-view')
        </section>
        @yield('js-view')
    </body>
</html>
