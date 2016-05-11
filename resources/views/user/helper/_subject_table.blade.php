<div class="disciplinas">

    @if(count($user->subjects) == 0)

        <div class="bg-danger">
            @if($user->type == 1)
                <p><strong>NOTA: </strong>Esse aluno ainda não foi matriculado em nenhuma disciplina. Para matricular um aluno, vá ao {{ link_to_route('subject.index', 'menu de disciplinas') }}, encontre e acesse a disciplina desejada e, então, vá ao menu de <span class="bg-danger-invert">Ações</span> > <span class="bg-danger-invert">Matricular Aluno</span>.</p>
            @else
                <p><strong>NOTA: </strong>Esse professor ainda não foi vinculado à nenhuma disciplina. Para matricular um aluno, vá ao {{ link_to_route('subject.index', 'menu de disciplinas') }}, encontre e acesse a disciplina desejada e, então, vá ao menu de <span class="bg-danger-invert">Ações</span> > <span class="bg-danger-invert">Cadastrar Professor</span>.</p>
            @endif
        </div>

    @else

        <h3 class="optional-slide">
            Disciplinas vinculadas à esse {{ ($user->type == 1) ? 'aluno' : 'professor' }}
            <button class="btn btn-link"><span class="glyphicon glyphicon-chevron-down"></span></button>
        </h3>

        <div class="optional optional-hide">
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>Semestre/Ano</td>
                    <td>Período</td>
                </tr>
                </thead>
                <tbody>
                @foreach($user->subjects as $subject)
                    <tr>
                        <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('subject.show', $subject->name, array($subject->id)) }}</td>
                        <td>{{ $subject->semester }}º</td>
                        <td>{{ $subject->pivot->year_semester }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endif
</div>