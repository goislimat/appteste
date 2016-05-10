<nav class="navbar">
    <div class="nav navbar-nav navbar-right">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span> Ações
            </button>
            <ul class="dropdown-menu">
                <li>{{ link_to_route('course.subject.create', 'Nova Disciplina', array($course->id)) }}</li>
                <li>{{ link_to_route('course.user.create', 'Novo Aluno', array($course->id)) }}</li>
                <li role="separator" class="divider"></li>
                <li>{{ link_to_route('course.edit', 'Editar Curso', $course->id, array()) }}</li>
                <li role="separator" class="divider"></li>
                <li>
                    {{ Form::open(array('route' => array('course.destroy', $course->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                    {{ Form::submit('Excluir Curso', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                    {{ Form::close() }}
                </li>
            </ul>
        </div>
    </div>
</nav>