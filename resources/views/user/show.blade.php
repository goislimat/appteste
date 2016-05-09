@extends('app')

@section('content')
<div class="container">
    <nav class="navbar">
        <div class="nav navbar-nav navbar-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span> Ações
                </button>
                <ul class="dropdown-menu">
                    <li>{{ link_to_route('user.edit', 'Editar', $user->id, array()) }}</li>
                    <li role="separator" class="divider"></li>
                    <li>
                        {{ Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                            {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <h2>#{{ $user->id }} - {{ $user->name }}</h2>
    <ul class="list-group col-md-6">
        <li class="list-group-item">Usuário: <strong>{{ $user->user }}</strong></li>
        <li class="list-group-item">E-mail: <strong>{{ $user->email }}</strong></li>
        <li class="list-group-item">Ano de ingresso no IFTM: <strong>{{ $user->ingress_year }}</strong></li>
        <li class="list-group-item">Privilégios de usuário: <strong>
            @if($user->type == 1)
                Aluno
            @elseif($user->type == 2)
                Professor
            @else
                Administrador
            @endif
            </strong>
        </li>
        @if($user->type == 1)
        <li class="list-group-item">Curso: <strong>{{ $user->course->name }}</strong></li>
        @endif
    </ul> 
    
    @if($user->type == 1)
    <div class="disciplinas">    
        <h4>Disciplinas vinculadas à esse aluno</h4>
        
        <table class="table table-condensed">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Semestre/Ano</td>
                    <td>Período</td>
                </tr>
            </thead>
            <tbody>
                @foreach($user->subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->semester }}º</td>
                    <td>{{ $subject->pivot->year_semester }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @elseif($user->type == 2)
    <div class="disciplinas">    
        <h4>Disciplinas vinculadas à esse professor</h4>
        
        <table class="table table-condensed">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Semestre/Ano</td>
                    <td>Período</td>
                </tr>
            </thead>
            <tbody>
                @foreach($user->subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->semester }}º</td>
                    <td>{{ $subject->pivot->year_semester }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Informações de Manutenção</h3>
        </div>
        <div class="panel-body">
            <p>Usuário criado em: <strong>{{ date_format($user->created_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($user->created_at, 'H:i:s') }}</strong></p>
            <p>Dados Atualizados pela última vez em: <strong>{{ date_format($user->updated_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($user->updated_at, 'H:i:s') }}</strong></p>
        </div>
    </div>
</div>

<script>
    $(document).on('submit', '.form-delete', function() {
        return confirm('Tem certeza que deseja excluir esse usuário?');
    });
</script>
@endsection