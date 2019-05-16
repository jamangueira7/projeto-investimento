@extends("templates.master")



@section('conteudo-view')

    {!! Form::open(['route'=> ['instituition.product.store',$instituition->id],'method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.input', ['label' => 'Nome do produto', 'input' => 'name'])
        @include('templates.formulario.input', ['label' => 'Descrição', 'input' => 'description'])
        @include('templates.formulario.input', ['label' => 'Indexador', 'input' => 'index'])
        @include('templates.formulario.input', ['label' => 'Taxa de juros', 'input' => 'interest_rate'])
        @include('templates.formulario.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    <table class="default-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome do produto</th>
            <th>Descrição</th>
            <th>Indexador</th>
            <th>Taxa</th>
            <th>Opções</th>
        </tr>
        </thead>
        <tbody>
            @forelse($instituition->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description}}</td>
                    <td>{{ $product->index}}</td>
                    <td>{{ $product->interest_rate}}</td>
                    <td>
                        {!! Form::open(['route' => ['instituition.product.destroy', $instituition->id, $product->id], 'method' => 'delete']) !!}
                            {!! Form::submit("Remover") !!}
                        {!! Form::close() !!}
                        <a href="{{route('group.show', $product->id)}}">Detalhes</a>
                        <a href="{{route('group.edit', $product->id)}}">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nada cadastrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop
