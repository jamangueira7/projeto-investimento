<table class="default-table">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Nascimento</th>
        <th>E-mail</th>
        <th>Status</th>
        <th>Permissão</th>
        <th>Menu</th>
    </tr>
    </thead>
    <tbody>
    @foreach($user_list as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->formatted_cpf}}</td>
            <td>{{$user->formatted_phone}}</td>
            <td>{{$user->formatted_birth}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status}}</td>
            <td>{{$user->permission}}</td>
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('Remover')!!}
                {!! Form::close() !!}
                <a href="{{route('user.edit', $user->id)}}">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
