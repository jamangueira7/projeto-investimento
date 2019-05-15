@extends("templates.master")

@section('conteudo-view')

    <table class="default-table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Nome da insttituição</th>
            <th>Valor investido</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_list as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->instituition->name }}</td>
                <td>{{ $product->valueFromUser(Auth::user()) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
