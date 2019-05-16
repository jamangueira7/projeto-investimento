@extends("templates.master")


@section('css-view')

@stop

@section('conteudo-view')

    {!! Form::model($user,['route'=> ['user.update',$user->id],'method' => 'put', 'class' => 'form-padrao']) !!}
        @include('user.form-fields')
        @include('templates.formulario.submit', ['input' => 'Atualizar'])
    {!! Form::close() !!}

@stop

@section('js-view')

@stop
