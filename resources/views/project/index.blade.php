@extends('app')

@section('content')
<div class="container-fluid">
    <h2>Lista de projetos cadastrados</h2>
    
    {{ link_to_route('project.create', 'Novo', array(), array('class' => 'btn btn-primary btn-sm')) }}
    
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
                <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('project.show', $project->title, $project->id, array()) }}</td>
                <td>{{ $project->grade }}</td>
                <td>{{ $project->subject->name }}</td>
                <td>{{ $project->due_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection