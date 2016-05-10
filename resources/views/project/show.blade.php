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
                    <li>{{ link_to_route('subject.project.edit', 'Editar', array($project->subject_id, $project->id), array()) }}</li>
                    <li role="separator" class="divider"></li>
                    <li>
                        {{ Form::open(array('route' => array('subject.project.destroy', $project->subject_id, $project->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                            {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <h2>#{{ $project->id }} - {{ $project->title }}</h2>
    <h4>Data limite de entrega: {{ date_format(date_create($project->due_date), 'd/m/Y') }} às {{ date_format(date_create($project->due_date), 'H:i:s') }}</h4>

    @if($project->grade != null)
        <h5>Valor: {{ $project->grade }} pontos</h5>
    @endif

    <h6>Disciplina: {{ $project->subject->name }}</h6>

    @if($project->description != null)
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Descrição do Trabalho</div>
                <div class="panel-body">
                    {{ nl2br(e($project->description)) }}
                </div>
            </div>
        </div>
    @endif


    
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
@endsection