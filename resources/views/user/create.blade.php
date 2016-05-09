@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="col-md-offset-3 col-md-6">
        <h2>Cadastrar Usuário</h2>
        
        {{ Form::open(array('route' => array('user.store'), 'method' => 'post')) }}
            {{ Form::label('name', 'Nome:') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            
            {{ Form::label('email', 'E-mail:') }}
            {{ Form::text('email', null, array('class' => 'form-control')) }}
            
            {{ Form::label('type', 'Tipo:') }}
            {{ Form::select('type', array('1' => 'Aluno', '2' => 'Professor', '3' => 'Administrador'), '1', array('class' => 'form-control user-type')) }}
            
            {{ Form::label('ingress_year', 'Ano:') }}
            {{ Form::number('ingress_year', 2016, array('class' => 'form-control')) }}
            
            {{ Form::label('course_id', 'Curso:') }}
            {{ Form::select('course_id', $courses, null, array('class' => 'form-control course', 'enabled')) }}
            
            {{ Form::submit('Concluir', array('class' => 'btn btn-primary btn-form')) }}
            {{ link_to_route('user.index', 'Cancelar', array(), array('class' => 'btn btn-danger btn-sm btn-form')) }}
            
        {{ Form::close() }}
    </div>
    
</div>
    
<script>
    function changePropOnCourseSelect(value)
    {
        if(value != 1)
        {
            $('.course').hide().prev().hide();
            $('.course').prop('disabled', true);
            $('.course option:first').prop('selected', true);
        }
        else
        {
            $('.course').show().prev().show();
            $('.course').prop('disabled', false);
        }
    }

    $(window).on('load', function() 
    {
        changePropOnCourseSelect($('.user-type').val());
    });
    
    $('.user-type').on('change', function()
    {
        changePropOnCourseSelect(this.value);
    });
</script>
@endsection