@extends('app')

@section('content')
<div class="container">
    
    <h2>Lista de Disciplinas Cadastradas</h2>
    
    {{ link_to_route('subject.create', 'Novo', array(), array('class' => 'btn btn-primary btn-sm')) }}
    
    <table class="table table-condensed">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Semestre / Ano</td>
                <td>Curso</td>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td><span class="glyphicon glyphicon-link" aria-hidden="true"></span> {{ link_to_route('subject.show', $subject->name, $subject->id, array()) }}</td>
                <td>{{ $subject->semester }}</td>
                <td>{{ $subject->course->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection