@extends('.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-offset-2 col-md-8">
            <h2>Matricular Aluno</h2>

            {{ Form::open(array('route' => array('enroll.store'), 'method' => 'post')) }}

            <div class="form-group">
                {{ Form::label('subject_id', 'Disciplina:', array('class' => 'control-label')) }}
                {{ Form::select('subject_id', $subjects, $subjectId, array('class' => 'form-control', 'readonly' => 'readonly')) }}
            </div>

            <div class="form-group">
                {{ Form::label('user_id', 'Aluno:', array('class' => 'control-label')) }}
                {{ Form::select('user_id', $students, null, array('class' => 'form-control')) }}
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
        </div>
    </div>
@endsection