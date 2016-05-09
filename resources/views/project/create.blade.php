@extends('app')

@section('content')
<div class="container-fluid">
    <div class="col-md-offset-3 col-md-6">
        
        <h2>Cadastrar Projeto</h2>
        
        {{ Form::open(array('route' => array('project.store'), 'method' => 'post')) }}
            
            {{ Form::label('title', 'Título:') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            
            {{ Form::label('subject_id', 'Disciplina:') }}
            {{ Form::select('subject_id', $subjects, null, array('class' => 'form-control')) }}
            
            {{ Form::label('grade', 'Pontuação:') }}
            {{ Form::number('grade', null, array('class' => 'form-control')) }}
            
            {{ Form::label('description', 'Descrição:') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
            
            <div class="form-group">
                {{ Form::label('due_date', 'Data:') }}
                <div class="date">
                    <div class="input-group input-append date" id="dateRangePicker">
                        <input type="text" class="form-control" name="due_date" />
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
            
            {{ Form::label('time', 'Hora limite:') }}
            {{ Form::text('time', '23:59:59', array('class' => 'form-control time')) }}
            
            {{ Form::submit('Concluir', array('class' => 'btn btn-primary btn-form')) }}
            {{ link_to_route('project.index', 'Cancelar', array(), array('class' => 'btn btn-danger btn-sm btn-form')) }}
            
        {{ Form::close() }}
        
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.time').mask('00:00:00');
        
        $('#dateRangePicker')
        .datepicker({
            format: 'dd/mm/yyyy',
            startDate: '01/01/2016',
            endDate: '31/12/2020'
        });
    });
</script>
@endsection