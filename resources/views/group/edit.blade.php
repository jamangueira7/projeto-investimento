@extends("templates.master")



@section('conteudo-view')

    @if(session('success'))
        <h3>{{session('success')['messages']}}</h3>
    @endif

    {!! Form::model($group,['route'=> ['group.update', $group->id],'method' => 'put', 'class' => 'form-padrao']) !!}
    @include('templates.formulario.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do Grupo']])
    @include('templates.formulario.select', ['label' => 'User', 'select' => 'user_id', 'data' => $user_list])
    @include('templates.formulario.select', ['label' => 'Instituition', 'select' => 'instituition_id','data' => $instituition_list])
    @include('templates.formulario.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    @include('user.list',['user_list' => $group->users])
@stop
