@extends('app')

@section('content')
<div class="container-fluid">
    
    <div class="col-md-offset-3 col-md-6">
        <h2>Cadastrar Curso</h2>
        
        {{ Form::open(array('route' => array('course.store'), 'method' => 'post')) }}
            {{ Form::label('name', 'Nome:') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            
            {{ Form::label('abbr', 'Abreviação:') }}
            {{ Form::text('abbr', null, array('class' => 'form-control')) }}
            
            {{ Form::label('type', 'Tipo:') }}
            {{ Form::select('type', array('Bacharelado' => 'Bacharelado', 'Licenciatura' => 'Licenciatura', 'Tecnólogo' => 'Tecnólogo'), 'bacharel', array('class' => 'form-control')) }}
            
            <br>
            
            {{ Form::submit('Concluir', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    
</div>
@endsection