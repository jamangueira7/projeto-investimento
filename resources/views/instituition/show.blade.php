@extends("templates.master")



@section('conteudo-view')

    @include('group.list',['group_list' => $instituition->groups])

@stop
