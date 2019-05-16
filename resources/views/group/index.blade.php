@extends("templates.master")



@section('conteudo-view')

    {!! Form::open(['route'=> 'group.store','method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do Grupo']])
        @include('templates.formulario.select', ['label' => 'User', 'select' => 'user_id', 'data' => $user_list])
        @include('templates.formulario.select', ['label' => 'Instituition', 'select' => 'instituition_id','data' => $instituition_list])
        @include('templates.formulario.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    @include('group.list',['group_list' => $groups])
@stop
