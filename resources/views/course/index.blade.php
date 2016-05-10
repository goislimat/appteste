@extends('layouts.app')

@section('content')
<div class="container-fuild">
    
    <h2>Lista de Cursos Cadastrados</h2>
    
    {{ link_to_route('course.create', 'Novo', array(), array('class' => 'btn btn-primary btn-sm')) }}
    
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Abreviação</td>
                <td>Tipo</td>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td><span class="glyphicon glyphicon-link" aria-hidden="true"></span> {{ link_to_route('course.show', $course->name, $course->id, array()) }}</td>
                <td>{{ $course->abbr }}</td>
                <td>{{ $course->type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="col-md-offset-3 col-md-6">
        {{ $courses->links() }}
    </div>
</div>
@endsection