@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @include('.project.helper._actions')
    
    <h2>#{{ $project->id }} - {{ $project->title }}</h2>
    <h4>Data limite de entrega: {{ date_format(date_create($project->due_date), 'd/m/Y') }} às {{ date_format(date_create($project->due_date), 'H:i:s') }}</h4>

    @if($project->grade != null)
        <h5>Valor: {{ $project->grade }} pontos</h5>
    @endif

    <h6>Disciplina: {{ $project->subject->name }}</h6>

    @if($project->description != null)
        <div class="col-md-offset-1 col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading optional-slide">Descrição do Trabalho</div>
                <div class="panel-body optional optional-hide">
                    {!! $project->description !!}
                </div>
            </div>
        </div>
    @endif

    <hr class="clearfix">

    <div class="clearfix">
        <h3>Lista de envio de trabalho</h3>

        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <td>Aluno</td>
                    <td>Hora do envio</td>
                    <td>Arquivo</td>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->updated_at }}</td>
                        <td>{{ link_to_route('getfile', 'Download', array($project->subject_id, $project->id, $student->filename)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <div class="well well-sm">
        {{ Form::open(array('route' => array('addfile', $project->subject_id, $project->id), 'method' => 'post', 'files' => true, 'class' => 'form-project-file')) }}
            <button class="btn btn-default">
                <span class="glyphicon glyphicon-upload"></span> Enviar Trabalho
            </button>

            <div class="form-group">
                {{ Form::label('project_file', 'Arquivo:', array('class' => 'control-label')) }}
                {{ Form::file('project_file') }}
            </div>
        {{ Form::close() }}
    </div>

    <hr>

    @include('.project.helper._maintenance')

</div>
@endsection