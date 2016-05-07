@extends('app')

@section('content')
<div class="container">
    
    <div class="col-md-offset-3 col-md-6">
        <h2>Cadastrar Usuário</h2>
        
        {{ Form::open(array('route' => array('user.store'), 'method' => 'post')) }}
            {{ Form::label('name', 'Nome:') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            
            {{ Form::label('email', 'E-mail:') }}
            {{ Form::text('email', null, array('class' => 'form-control')) }}
            
            {{ Form::label('type', 'Tipo:') }}
            {{ Form::select('type', array('1' => 'Aluno', '2' => 'Professor', '3' => 'Administrador'), '1', array('class' => 'form-control')) }}
            
            {{ Form::label('ingress_year', 'Ano:') }}
            {{ Form::number('ingress_year', 2016, array('class' => 'form-control')) }}
            
            <br>
            
            {{ Form::submit('Concluir', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    
</div>
@endsection