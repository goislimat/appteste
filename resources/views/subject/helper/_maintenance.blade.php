<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Informações de Manutenção</h3>
    </div>
    <div class="panel-body">
        <p>Disciplina criada em: <strong>{{ date_format($subject->created_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($subject->created_at, 'H:i:s') }}</strong></p>
        <p>Dados Atualizados pela última vez em: <strong>{{ date_format($subject->updated_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($subject->updated_at, 'H:i:s') }}</strong></p>
    </div>
</div>