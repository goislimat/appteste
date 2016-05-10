{{ 
    (!isset($subject))
    ? Form::open(array('route' => array('subject.store'), 'method' => 'post')) 
    : Form::open(array('route' => array('subject.update', $subject->id), 'method' => 'put'))
}}
    <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
        {{ Form::label('name', 'Nome:') }}
        {{ Form::text('name', (isset($subject)) ? $subject->name : old('name'), array('class' => 'form-control')) }}
        
        @if($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        {{ Form::label('course_id', 'Curso:') }}
        {{ Form::select('course_id', $courses, (isset($subject)) ? $subject->course_id : old('course_id'), array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group{{ ($errors->has('semester')) ? ' has-error' : '' }}">
        {{ Form::label('semester', 'Semestre/Ano:', array('class' => 'label-control')) }}
        {{ Form::number('semester', (isset($subject)) ? $subject->semester : old('semester'), array('class' => 'form-control')) }}
        
        @if($errors->has('semester'))
            <span class="help-block">
                <strong>{{ $errors->first('semester') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        {{ Form::submit('Concluir', array('class' => 'btn btn-primary btn-form')) }}
        {{ link_to_route('subject.index', 'Cancelar', array(), array('class' => 'btn btn-danger btn-sm btn-form')) }}
    </div>
    
{{ Form::close() }}