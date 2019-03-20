@extends("templates.master")



@section('conteudo-view')

    @if(session('success'))
        <h3>{{session('success')['messages']}}</h3>
    @endif

    {!! Form::open(['route'=> ['group.user.store', $group->id],'method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.select', [
        'label' => 'Usuario',
        'select' => 'user_id',
        'data' => $user_list,
        'attributes' => ['placeholder' => 'Usuario']
        ])
        @include('templates.formulario.submit', ['input' => 'Relacionar ao grupo: '.$group->name])
    {!! Form::close() !!}

    @include('user.list',['user_list' => $group->users])
@stop
