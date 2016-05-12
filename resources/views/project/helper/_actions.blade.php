<nav class="navbar">
    <div class="nav navbar-nav navbar-right">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span> Ações
            </button>
            <ul class="dropdown-menu">
                <li>{{ link_to_route('subject.project.edit', 'Editar', array($project->subject_id, $project->id), array()) }}</li>
                <li role="separator" class="divider"></li>
                <li>
                    {{ Form::open(array('route' => array('subject.project.destroy', $project->subject_id, $project->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                    {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                    {{ Form::close() }}
                </li>
            </ul>
        </div>
    </div>
</nav>