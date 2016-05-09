@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="col-md-offset-3 col-md-6">
        <h2>Cadastrar Disciplina</h2>
        
        {{ Form::open(array('route' => array('subject.store'), 'method' => 'post')) }}
            {{ Form::label('name', 'Nome:') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            
            {{ Form::label('course_id', 'Curso:') }}
            {{ Form::select('course_id', $courses, null, array('class' => 'form-control')) }}
            
            {{ Form::label('semester', 'Semestre/Ano:') }}
            {{ Form::number('semester', null, array('class' => 'form-control')) }}
            
            {{ Form::submit('Concluir', array('class' => 'btn btn-primary btn-form')) }}
            {{ link_to_route('subject.index', 'Cancelar', array(), array('class' => 'btn btn-danger btn-sm btn-form')) }}
            
        {{ Form::close() }}
    </div>
    
</div>
@endsection