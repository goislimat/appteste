{{ 
    (!isset($course)) 
    ? Form::open(array('route' => array('course.store'), 'method' => 'post')) 
    : Form::open(array('route' => array('course.update', $course->id), 'method' => 'put')) 
}} 

            
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label" for="name">Nome:</label>

        <input type="text" class="form-control" name="name" value="{{ (isset($course)) ? $course->name : old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group{{ $errors->has('abbr') ? ' has-error' : '' }}">
        <label class="control-label" for="abbr">Abreviação:</label>

        <input type="text" class="form-control" name="abbr" value="{{ (isset($course)) ? $course->abbr : old('abbr') }}">

        @if ($errors->has('abbr'))
            <span class="help-block">
                <strong>{{ $errors->first('abbr') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        {{ Form::label('type', 'Tipo:') }}
        {{ Form::select('type', array('Bacharelado' => 'Bacharelado', 'Licenciatura' => 'Licenciatura', 'Tecnólogo' => 'Tecnólogo', 'Técnico' => 'Técnico'), (isset($course)) ? $course->type : 'Bacharelado', array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group">
        {{ Form::submit('Concluir', array('class' => 'btn btn-primary btn-form')) }}
        {{ link_to_route('course.index', 'Cancelar', array(), array('class' => 'btn btn-danger btn-sm btn-form')) }}
    </div>
    
{{ Form::close() }}