@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')

    {!! Form::open(['route'=> 'user.store','method' => 'post', 'class' => 'form-padrao']) !!}
        @include('user.form-fields')
        @include('templates.formulario.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}


    @include('user.list',['user_list' => $users])
@stop

@section('js-view')

@stop
