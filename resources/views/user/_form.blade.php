{{
    (!isset($user))
    ? Form::open(array('route' => array('user.store'), 'method' => 'post'))
    : Form::open(array('route' => array('user.update', $user->id), 'method' => 'put'))
}}

    <div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
        {{ Form::label('name', 'Nome:', array('class' => 'label-control')) }}
        {{ Form::text('name', (isset($user)) ? $user->name : old('name'), array('class' => 'form-control')) }}
        
        @if($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
        {{ Form::label('email', 'E-mail:', array('class' => 'label-control')) }}
        {{ Form::email('email', (isset($user)) ? $user->email : old('email'), array('class' => 'form-control')) }}
        
        @if($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        {{ Form::label('type', 'Tipo:', array('class' => 'label-control')) }}
        {{ Form::select('type', array('1' => 'Aluno', '2' => 'Professor', '3' => 'Administrador'), (isset($user)) ? $user->type : old('type'), array('class' => 'form-control user-type')) }}
    </div>

    <div class="form-group{{ ($errors->has('ingress_year')) ? ' has-error' : '' }}">
        {{ Form::label('ingress_year', 'Ano de ingresso:', array('class' => 'label-control')) }}
        {{ Form::number('ingress_year', (isset($user)) ? $user->ingress_year : old('ingress_year'), array('class' => 'form-control', 'min' => '2000', 'max' => '2100')) }}
        
        @if($errors->has('ingress_year'))
            <span class="help-block">
                <strong>{{ $errors->first('ingress_year') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group">
        {{ Form::label('course_id', 'Curso:') }}
        {{ Form::select('course_id', $courses, (isset($user)) ? $user->course_id : $courseId, array('class' => 'form-control course', 'enabled')) }}
    </div>
    
    <div class="form-group">
        {{ Form::submit('Concluir', array('class' => 'btn btn-primary btn-form')) }}
        {{ link_to_route('user.index', 'Cancelar', array(), array('class' => 'btn btn-danger btn-sm btn-form')) }}
    </div>
    
{{ Form::close() }}