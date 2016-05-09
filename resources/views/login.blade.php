@extends('app')

@section('content')
<div class="container-fluid">
    {{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'col-md-offset-3 col-md-6 form-login row')) }}
        
        <div class="form-group">
        {{ Form::label('user', 'Usuário:') }}
        {{ Form::text('user', null, array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
        {{ Form::label('password', 'Senha:') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        
        {{ link_to('#', 'Esqueci minha senha', array('class' => 'col-md-6')) }}
        {{ link_to('#', 'Ainda não possui cadastro?', array('class' => 'col-md-6')) }}
        
        <div class="form-group">
        {{ Form::submit('Login', array('class' => 'btn btn-primary btn-form')) }}
        </div>
    {{ Form::close() }}
</div>
@endsection