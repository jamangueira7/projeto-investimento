@extends("templates.master")



@section('conteudo-view')

    {!! Form::model($instituition,['route'=> ['instituition.update', $instituition->id],'method' => 'put', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
        @include('templates.formulario.submit', ['input' => 'Atualizar'])
    {!! Form::close() !!}
@stop
