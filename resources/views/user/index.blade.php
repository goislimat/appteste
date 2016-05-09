@extends('app')

@section('content')
<div class="container-fluid">
    <h2>Lista de usuários cadastrados no sistema</h2>
    
    {{ link_to_route('user.create', 'Novo', array(), array('class' => 'btn btn-primary btn-sm')) }}
    
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Usuário</td>
                <td>Tipo</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('user.show', $user->name, $user->id, array()) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user }}</td>
                <td>
                @if($user->type == 1)
                    Aluno
                @elseif($user->type == 2)
                    Professor
                @else
                    Administrador
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection