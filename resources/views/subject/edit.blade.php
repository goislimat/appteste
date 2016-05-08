@extends('app')

@section('content')
@section('content')
<div class="container">
    
    <div class="col-md-offset-3 col-md-6">
        <h2>Cadastrar Disciplina</h2>
        
        {{ Form::open(array('route' => array('subject.update', $subject->id), 'method' => 'put')) }}
            {{ Form::label('name', 'Nome:') }}
            {{ Form::text('name', $subject->name, array('class' => 'form-control')) }}
            
            {{ Form::label('course_id', 'Curso:') }}
            {{ Form::select('course_id', $courses, $subject->course_id, array('class' => 'form-control')) }}
            
            {{ Form::label('semester', 'Semestre/Ano:') }}
            {{ Form::number('semester', $subject->semester, array('class' => 'form-control')) }}
            
            <br>
            
            {{ Form::submit('Concluir', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    
</div>
@endsection