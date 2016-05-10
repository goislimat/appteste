{{
    (!isset($project))
    ? Form::open(array('route' => array('project.store'), 'method' => 'post'))
    : Form::open(array('route' => array('project.update', $project->id), 'method' => 'put'))
}}

    <div class="form-group{{ ($errors->has('title')) ? ' has-error' : '' }}">
        {{ Form::label('title', 'Título:', array('class' => 'control-label')) }}
        {{ Form::text('title', (isset($project)) ? $project->title : old('title'), array('class' => 'form-control')) }}
                
        @if($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        {{ Form::label('subject_id', 'Disciplina:', array('class' => 'control-label')) }}
        {{ Form::select('subject_id', $subjects, (isset($project)) ? $project->subject_id : old('subject_id'), array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group{{ ($errors->has('grade')) ? ' has-error' : '' }}">
        {{ Form::label('grade', 'Pontuação', array('class' => 'label-control')) }}
        {{ Form::number('grade', (isset($project)) ? $project->grade : old('grade'), array('class' => 'form-control', 'min' => '0', 'steps' => 'any')) }}
        
        @if($errors->has('grade'))
            <span class="help-block">
                <strong>{{ $errors->first('grade') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group{{ ($errors->has('description')) ? ' has-error' : '' }}">
        {{ Form::label('description', 'Descrição:', array('class' => 'control-label')) }}
        {{ Form::textarea('description', (isset($project)) ? $project->description : old('description'), array('class' => 'form-control')) }}
        
        @if($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group {{ ($errors->has('due_date')) ? ' has-error' : '' }}">
        {{ Form::label('due_date', 'Data:', array('class' => 'control-label')) }}
        <div class="date">
            <div class="input-group input-append date" id="dateRangePicker">
                <input type="text" class="form-control" name="due_date" value="{{ (isset($project)) ? $project->due_date : old('due_date') }}"/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        
        @if($errors->has('due_date'))
            <span class="help-block">
                <strong>{{ $errors->first('due_date') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group{{ ($errors->has('time')) ? ' has-error' : '' }}">
        {{ Form::label('time', 'Hora limite:', array('class' => 'control-label')) }}
        {{ Form::text('time', (isset($project)) ? $project->time : old('time'), array('class' => 'form-control time', 'placeholder' => '23:59:59')) }}
        
        @if($errors->has('time'))
            <span class="help-block">
                <strong>{{ $errors->first('time') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        {{ Form::submit('Concluir', array('class' => 'btn btn-primary btn-form')) }}
        {{ link_to_route('project.index', 'Cancelar', array(), array('class' => 'btn btn-danger btn-sm btn-form')) }}
    </div>
    
{{ Form::close() }}