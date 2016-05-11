<nav class="navbar">
    <div class="nav navbar-nav navbar-right">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span> Ações
            </button>
            <ul class="dropdown-menu">
                <li>{{ link_to_route('subject.project.create', 'Novo Trabalho', array($subject->id), array('class' => 'text-primary')) }}</li>
                <li role="separator" class="divider"></li>
                <li role="separator" class="divider"></li>
                <li>{{ link_to_route('enroll.new', 'Matricular Aluno', array($subject->id)) }}</li>
                <li>{{ link_to_route('subject.all', 'Buscar Todos os Alunos', array($subject->id)) }}</li>
                <li role="separator" class="divider"></li>
                <li>{{ link_to_route('enroll.new.teacher', 'Cadastrar Professor', array($subject->id)) }}</li>
                <li>{{ link_to_route('subject.all', 'Buscar Todos os Professores', array($subject->id, 'teacher')) }}</li>
                <li role="separator" class="divider"></li>
                <li>{{ link_to_route('subject.edit', 'Editar Disciplina', $subject->id, array()) }}</li>
                <li role="separator" class="divider"></li>
                <li>
                    {{ Form::open(array('route' => array('subject.destroy', $subject->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                    {{ Form::submit('Excluir Disciplina', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                    {{ Form::close() }}
                </li>
            </ul>
        </div>
    </div>
</nav>