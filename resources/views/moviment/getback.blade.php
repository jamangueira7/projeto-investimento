@extends("templates.master")

@section('conteudo-view')
    {!! Form::open(['route'=> 'moviment.getback.store','method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.select', ['label' => 'Grupo', 'select' => 'group_id','data' => $group_list])
        @include('templates.formulario.select', ['label' => 'Produto', 'select' => 'product_id','data' => $product_list])
        @include('templates.formulario.input', ['label' => 'Valor', 'input' => 'value', 'attributes' => ['placeholder' => 'Valor']])
        @include('templates.formulario.submit', ['input' => 'Atualizar'])
    {!! Form::close() !!}
@stop
