@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <nav class="navbar">
        <div class="nav navbar-nav navbar-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span> Ações
                </button>
                <ul class="dropdown-menu">
                    <li>{{ link_to_route('project.edit', 'Editar', $project->id, array()) }}</li>
                    <li role="separator" class="divider"></li>
                    <li>
                        {{ Form::open(array('route' => array('project.destroy', $project->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                            {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <h2>#{{ $project->id }} - {{ $project->title }}</h2>
    <h4>Data limite de entrega: {{ $project->due_date }}</h4>
    <h6>Disciplina: {{ $project->subject->name }}</h6>
    
    LISTA DE ARQUIVOS SUBMETIDOS AO TRABALHO
    
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Informações de Manutenção</h3>
        </div>
        <div class="panel-body">
            <p>Projeto criado em: <strong>{{ date_format($project->created_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($project->created_at, 'H:i:s') }}</strong></p>
            <p>Dados Atualizados pela última vez em: <strong>{{ date_format($project->updated_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($project->updated_at, 'H:i:s') }}</strong></p>
        </div>
    </div>
</div>

<script>
    $(document).on('submit', '.form-delete', function() {
        return confirm('Tem certeza que deseja excluir esse trabalho?');
    });
</script>
@endsection