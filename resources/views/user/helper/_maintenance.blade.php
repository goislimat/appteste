<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Informações de Manutenção</h3>
    </div>
    <div class="panel-body">
        <p>Usuário criado em: <strong>{{ date_format($user->created_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($user->created_at, 'H:i:s') }}</strong></p>
        <p>Dados Atualizados pela última vez em: <strong>{{ date_format($user->updated_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($user->updated_at, 'H:i:s') }}</strong></p>
    </div>
</div>