@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2>Lista de projetos cadastrados</h2>
    
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <td>Título</td>
                <td>Nota</td>
                <td>Disciplina</td>
                <td>Data de Entrega</td>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('subject.project.show', $project->title, array($project->subject_id, $project->id)) }}</td>
                <td>{{ $project->grade }}</td>
                <td>{{ $project->subject->name }}</td>
                <td>{{ $project->due_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="col-md-offset-3 col-md-6">
        {{ $projects->links() }}
    </div>
</div>
@endsection