{{ Form::open(array('route' => array('enroll.store'), 'method' => 'post')) }}

<div class="form-group">
    {{ Form::label('subject', 'Disciplina:', array('class' => 'control-label')) }}
    {{ Form::select('subject', $subjects, $subjectId, array('class' => 'form-control', 'disabled')) }}
    {{ Form::hidden('subject_id', $subjectId) }}
</div>

<div class="form-group">
    {{ Form::label('user_id', (isset($students)) ? 'Aluno:' : 'Professor:', array('class' => 'control-label')) }}
    {{ Form::select('user_id', (isset($students)) ? $students : $teachers, null, array('class' => 'form-control')) }}
</div>

<div class="form-group{{ ($errors->has('year_semester')) ? ' has-error' : '' }}">
    {{ Form::label('year_semester', 'Ano/Semestre:', array('class' => 'label-control')) }}
    {{ Form::text('year_semester', ($errors->any()) ? old('year_semester') : date('Y') . '/' . ((date('m') > 6) ? '2': '1'), array('class' => 'form-control')) }}

    @if($errors->has('year_semester'))
        <span class="help-block">
            <strong>{{ $errors->first('year_semester') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    {{ Form::submit('Concluir', array('class' => 'btn btn-primary')) }}
    {{ link_to_route('subject.show', 'Cancelar', array($subjectId), array('class' => 'btn btn-danger btn-sm')) }}
</div>

{{ Form::close() }}