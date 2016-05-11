<nav class="navbar">
    <div class="nav navbar-nav navbar-right">
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span> Ações
            </button>
            <ul class="dropdown-menu">
                <li>{{ link_to_route('user.edit', 'Editar', $user->id, array()) }}</li>
                <li role="separator" class="divider"></li>
                <li>
                    {{ Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                    {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                    {{ Form::close() }}
                </li>
            </ul>
        </div>
    </div>
</nav>