@extends("templates.master")



@section('conteudo-view')

    @if(session('success'))
        <h3>{{session('success')['messages']}}</h3>
    @endif

    {!! Form::open(['route'=> 'group.store','method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do Grupo']])
        @include('templates.formulario.input', ['label' => 'User', 'input' => 'user_id', 'attributes' => ['placeholder' => 'User']])
        @include('templates.formulario.input', ['label' => 'Instituition', 'input' => 'instituition_id', 'attributes' => ['placeholder' => 'Instituition']])
        @include('templates.formulario.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    <table class="default-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome da Instituição</th>
                <th>Opção</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'delete']) !!}
                        {!! Form::submit("Remover") !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
